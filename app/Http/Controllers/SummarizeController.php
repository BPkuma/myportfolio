<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dialogue;
use Illuminate\Support\Facades\Auth;

class SummarizeController extends Controller
{
    public function summarize() {
        return view('summarize.summarize');
    }

    public function countdown() {
        return view('summarize.countdown');
    }

    public function index() {
        $dialogues = Dialogue::orderBy('order')->get();
        return view('summarize.countdown', compact('dialogues'));
    } 

}
