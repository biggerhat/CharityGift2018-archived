<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pick;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('welcome');
    }


    public function getPairings()
    {
        $pairings = Pick::where('pick_corp','!=','')->get();

        return view('pairings', compact('pairings'));
    }
}
