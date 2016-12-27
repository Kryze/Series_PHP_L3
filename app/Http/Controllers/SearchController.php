<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('search');
    }

}
