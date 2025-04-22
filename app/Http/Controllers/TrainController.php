<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(){
        $treni = Train::where('data_partenza', '>=', Carbon::today())
        ->orderBy('data_partenza', 'asc')
        ->get();

    return view('index', compact('treni'));


    }
}
