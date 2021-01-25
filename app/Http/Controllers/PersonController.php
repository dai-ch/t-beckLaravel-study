<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        // $item = Person::find($request->input);
        // $param = ['input' => $request->input, 'item' => $item];
        // $item = Person::where('name',$request->input)->first();
        // $param = ['input' => $request->input, 'item' => $item];
        $min  = $request->input * 1;
        $max = $min + 50;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {

        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        //トークンを削除
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/person');
    }
}
