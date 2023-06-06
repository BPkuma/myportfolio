<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SummarizeController extends Controller
{
    public function summarize() {
        return view('summarize.summarize');
    }

    public function countdown() {
        return view('summarize.countdown');
    }

}
