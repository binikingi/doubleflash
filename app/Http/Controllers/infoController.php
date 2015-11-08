<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\info;

class infoController extends Controller
{
	public function __construct(){
		$this->middleware('Admin');
	}
    public function editSelected($name){
    	$infoColl = info::where('name', $name)->limit(1)->get();
    	if($infoColl->count() > 0){
    		$info = $infoColl[0];
    		return view('pages.infoEdit', compact('info'));
    	}
    	else return 'not good';
    }
    public function updateSelected(Request $request){
    	$infoColl = info::where('name', $request->input('name'))->limit(1)->get();
    	echo $infoColl[0] . '<br>';
    	$infoColl[0]->update($request->all());
    	return redirect('/');
    }
}
