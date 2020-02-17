<?php

namespace App\Http\Controllers\RedEnvelopes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedController extends Controller
{
    /**
     * 发红包主页
     */
    public function index()
    {
        return view('RedEnvelopes.index');
    }

    public function send_red(Request $request)
    {

    }
}
