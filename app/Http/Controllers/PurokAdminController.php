<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PurokAdminController extends Controller
{
    //
    public function index()
    {
        return View::make('purokdashboard');
    }
}
