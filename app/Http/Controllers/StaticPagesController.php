<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;

class StaticPagesController extends Controller
{
    //
	public function home(){
		$albums = Album::all();
		return view('home',compact('albums'));
	}
}
