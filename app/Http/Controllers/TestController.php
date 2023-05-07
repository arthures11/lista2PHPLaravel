<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tests;
use App\Models\table_wyniki_testow;

class TestController extends Controller
{
    //
    public function add(Request $request)
    {

        //dd($request->all());
        $test = Tests::create([
            'title' => $request->title,
        ]);

        $ida = $test->id;
        $questionIds = collect();
        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'ck')) {
                $questionIds->push(str_replace('ck', '', $key));
            }
        }
        $test->questions()->attach($questionIds);

        $osobywynikowe = collect();

        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'user')) {
                $osobywynikowe->push(str_replace('userr', '', $key));
            }
        }

        foreach($osobywynikowe as $osoby){
            $wyniki = table_wyniki_testow::create([
                'user_id' => $osoby,
                'test_id' => $ida,
                'tytul' => $request->title,
                'inprogress' => true,

            ]);
        }

        return redirect()->back()->with('success', 'pytanie zostało dodane.');
    }
}
