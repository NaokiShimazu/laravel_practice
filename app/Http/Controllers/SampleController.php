<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function sample_action(){
        $title = 'コントローラーを利用したサンプル';
        $description = 'コントローラーを利用すると、ルーティングでphpの処理を書く必要が無くなります';
        return view('blade_sample', [
            'title' => $title,
            'description' => $description,
        ]);
    }
    public function practice_function(){
        return view('blade_sample', [
            'title' => '練習課題',
            'description' => '課題の例です',
        ]);
    }
    public function message_sample(){
        $message = \App\Message::all()->first();
        return view('message_sample',[
            'message' => $message,
        ]);
    }
    public function message_practice(){
        return view('message_practice',[
            'title' => '課題',
            'message' => \App\Message::find(5),
        ]);
    }
    public function blade_example(){
        $title = 'bladeテンプレートの様々な機能';
        $num = 10;
        $messages = \App\Message::all();
        return view('blade_example', [
            'title' => $title,
            'num' => $num,
            'messages' => $messages,
        ]);
    }
}
