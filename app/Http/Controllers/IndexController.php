<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class IndexController extends Controller
    {
        public function index(Request $request)
        {
            $UNIQID = uniqid();
            $request->session()->flush();
            $request->session()->regenerate();
            $request->session()->put('UNIQID', $UNIQID);

            return view("index");
        }
    }
