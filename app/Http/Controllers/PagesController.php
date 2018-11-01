<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function store(Request $request) {
        $name = $request->name;
        return redirect()->route('thanks',['name' => $name]);
    }

    public function thanks($name) {
        return view('pages.thankyou')->with(compact('name'));
    }

    public function about() {
        return view('pages.about');
    }
}
