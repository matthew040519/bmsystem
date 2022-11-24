<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;


class AdminController extends Controller
{
    //
    public function index()
    {
        return view::make('admindashboard');
    }
}
