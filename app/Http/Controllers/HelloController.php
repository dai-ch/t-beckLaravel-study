<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\HelloRequest;

use Validator;


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

    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {

        $validate_rule = [
            'msg' => 'required',
        ];

        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「' . $msg . '」クッキーを保存しました。']);
        $response->cookie('msg', $msg, 100);
        return $response;
    }
}
