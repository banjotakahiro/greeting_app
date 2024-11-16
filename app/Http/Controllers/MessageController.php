<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function comment($word){
        if ($word == 'morning') {
            $time = "朝";
            $greeting = "おはようございます。";
        }elseif ($word == 'afternoon') {
            $time = "昼";
            $greeting = "こんにちは";
        }elseif ($word == 'evening') {
            $time = "夕方";
            $greeting = "こんばんは";
        }elseif ($word == 'night') {
            $time = "夜";
            $greeting = "おやすみ";
        }

        if ($word == "random") {
            return $this->random();
        }
        return view('greeting.comments', ['time' => $time,'greeting' => $greeting]);

    }

    public function freeword($word){
        $time = "自由なメッセージ";
        $greeting = $word;
        return view('greeting.comments', ['time' => $time,'greeting' => $greeting]);
    }

    private function random(){
        $time = "ランダムなメッセージ";
        $greetings = ["おはようございます。","こんにちは","こんばんは"];
        $greeting = $greetings[array_rand($greetings)];
        return view('greeting.comments', ['time' => $time,'greeting' => $greeting]);
    }
}
