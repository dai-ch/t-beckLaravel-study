<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


// global $head, $style, $body, $end;

// $head = '<html><head>';
// $style = <<<EOF

// <style>
// body{ font-size:16pt; color:#999;}
// h1{ font-size:100pt; text-align:right; color:#eee;
//     margin:-40px 0 -50px 0px; }
// </style>
// EOF;
// $body =  '</head><body>';
// $end =  '</body></html>';

// function tag($tag, $txt)
// {
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }




class HelloController extends Controller
{

    public function index()
    {
        $data = [
            'msg' => 'お名前を入力してください'
        ];
        return view('hello.index', $data);
    }

    public function post(Request $request)
    {
        $msg = $request->msg;

        $data = [
            'msg' => 'こんにちは' . $msg . 'さん!',
        ];
        return view('hello.index', $data);
    }
}
