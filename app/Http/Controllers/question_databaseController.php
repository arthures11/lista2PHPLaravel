<?php

namespace App\Http\Controllers;

use App\Models\question_database;
use Illuminate\Http\Request;

class question_databaseController extends Controller
{
    //
    public function add(Request $request)
    {

        //dd($request->all());
        $question = question_database::create([
            'pytanie' => $request->pytanie,
            'odp1' =>$request->odp1,
            'odp2' =>$request->odp2,
            'odp3' =>$request->odp3,
            'prawidlowa' =>$request->prawidlowa,
        ]);


        return redirect()->back()->with('success', 'pytanie zostało dodane.');
    }
    public function update(Request $request, $id)
    {
        $pyt = question_database::findOrFail($id);
        $pyt->pytanie = $request->input('pytanie');
        $pyt->odp1 = $request->input('odp1');
        $pyt->odp2 = $request->input('odp2');
        $pyt->odp3 = $request->input('odp3');
        $pyt->prawidlowa = $request->input('prawidlowa');
        $pyt->save();

        return response('Zaktualizowano pytanie.', 200);
    }

    public function delete ($id)
    {
        $pyt = question_database::findOrFail($id);
        $pyt->delete();

        return response('Usunięto pytanie.', 200);
    }
}
