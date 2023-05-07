<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        return view('uczniowie.index', ['users' => $users]);

    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->klasa = $request->input('klasa');
        $user->save();

        return response('Zaktualizowano użytkownika', 200);
    }
    public function register(Request $request)
    {

        //dd($request->all());
        $user = User::create([
            'email' => $request->email,
            'password' =>$request->password,
        ]);


        return redirect()->back()->with('success', 'Użytkownik został dodany.');
    }

    public function delete ($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response('Usunięto', 200);
    }
}
