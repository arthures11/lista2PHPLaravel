<?php


namespace App\Http\Controllers;

use App\Models\Question_database;
use App\Models\Questions;
use App\Models\table_wyniki_testow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('home.index')->with('user', $user);
    }
    public function uczniowie()
    {
        $user = Auth::user();
        $users = User::with('table_wyniki_testow')->where('role', '!=', "nauczyciel")->get();
        return view('home.uczniowie', ['users' => $users])->with('user', $user);
    }

    public function pytania()
    {
        $user = Auth::user();
        $question_database = Question_database::all();
        return view('home.bazapytan', ['question_database' => $question_database])->with('user', $user);
    }

    public function addtest()
    {
        $user = Auth::user();
        $users = User::whereNotIn('role', ['nauczyciel'])->get();
        $classes = User::where('role', 'student')->pluck('klasa')->unique();
        $question_database = Question_database::all();
        return view('home.addtest', ['users' => $users])->with('user', $user)->with('classes', $classes)->with('question_database', $question_database);
    }

    public function testy()
    {
        $user = Auth::user();
        $tests = table_wyniki_testow::where('user_id', $user->id)->get();
        return view('home.testy')->with('tests', $tests)->with('user',$user);
    }
    public function test($id)
    {
        session(['test_id' => $id]);
        $user = Auth::user();
        $wynik = table_wyniki_testow::find($id);

        $test = $wynik->test;

        $rep = $wynik->raport;
        if(!$wynik->inprogress){

        }
        $pytania = $test->questions()->get();
        $pyta = $pytania;
        $test = [];
        foreach ($pytania as $pytanie) {
            $odpowiedzi = [$pytanie->odp1, $pytanie->odp2, $pytanie->odp3];
            shuffle($odpowiedzi);
            $pytanie->odp1 = $odpowiedzi[0];
            $pytanie->odp2 = $odpowiedzi[1];
            $pytanie->odp3 = $odpowiedzi[2];
            $test[] = $pytanie;
        }
        shuffle($test);



        return view('home.test')->with('test', $test)->with('user',$user)->with('pyta',$pyta)->with('rep',$rep);
    }
    public function sprawdzOdpowiedzi(Request $request)
    {
        $poprawneOdpowiedzi = 0;
        $id = session('test_id');
        $raport = "Wyniki:";
        // Pobierz odpowiedzi z formularza i sprawdź, czy są poprawne
        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'odp')) {
                $odpowiedzId = str_replace('odp', '', $key);
                $odpowiedz = question_database::find($odpowiedzId);
                $columnName = "odp" . $odpowiedz->prawidlowa;
                if ($value == $odpowiedz->{$columnName}) {
                    $poprawneOdpowiedzi++;
                    $raport.="\n" . $odpowiedz->pytanie . "ODPOWIEDŹ PRAWIDŁOWA";
                }
                else{
                    $raport.="\n" . $odpowiedz->pytanie . "BŁĘDNA ODPOWIEDŹ" . ", prawidłowa: " . $odpowiedz->{$columnName};
                }
              //  error_log($poprawneOdpowiedzi);
            }
        }
        $wynik = table_wyniki_testow::find($id);

        $test = $wynik->test;
        $pytania = $test->questions()->get();
        $procenty = $poprawneOdpowiedzi / count($pytania) * 100;
        $wyniks = table_wyniki_testow::findOrFail($id);
        $wyniks->wynik = $procenty;
        $wyniks->inprogress = false;
        $wyniks->raport = $raport;
        $wyniks->save();

        //return redirect('/wynik/' . $wynik->id);
        $user = Auth::user();
        $tests = table_wyniki_testow::where('user_id', $user->id)->get();
        return view('home.testy')->with('user',$user)->with('tests',$tests);
    }

}
