<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\service;
use App\event;
use App\servicePic;
use App\eventServices;
use App\help;
use App\info;
use App\Http\Requests\contactRequest;


class pagesController extends Controller
{
    function __construct(){
        $this->middleware('Admin', ['only'=>['editIndex']]);
    }
    
    public function index(){
        $info = info::where('name', 'index')->limit(1)->get()[0];
    	$services = service::all();
    	$events = event::all();
    	$servicePic = servicePic::all();
        $content = nl2br(file_get_contents('home.txt'));
    	return view('pages.index', compact('services', 'events', 'servicePic', 'content', 'info'));
    }

    public function editIndex(){
        $info = info::where('name', 'index')->limit(1)->get()[0];
        $text = file_get_contents('home.txt');
        return view('pages.edit', compact('text', 'info'));
    }

    public function saveEdit(Request $request){
        if(file_put_contents('home.txt', $request->input('content')))
            return redirect('/');
        else return 'אירעה שגיאה';
    }

    public function contact(){
        $info = info::where('name', 'contact')->limit(1)->get()[0];
        $helps = help::all();
    	$events = event::all();
    	$services = service::all();
    	return view('pages.contact', compact('helps', 'events', 'services', 'info'));
    }

    public function contactId($id){
        $info = info::where('name', 'contact')->limit(1)->get()[0];
        $helps = help::all();
    	$events = event::all();
    	$services = service::all();
    	$checkServiceArray = eventServices::where('event_id', $id)->get();
    	$checkService;
    	$currEvent = event::find($id);
    	foreach($checkServiceArray as $check)
    		$checkService[] = $check->service_id;
    	if(!empty($currEvent))
    		return view('pages.contact', compact('helps', 'events', 'services', 'checkService', 'currEvent', 'info'));
    	return redirect('/contact');
    }

    public function sendContact(contactRequest $request){
    	foreach($_POST as $key=>$val){
    		echo $key.': ';
    		print_r($val);
    		echo '<br>';
    	}
    }

    public function login(Request $request){
        $pass = $request->input('password');
        if(sha1($pass) != password()){
            $err = 'סיסמה שגויה';
            return view('auth.login', compact('err'));
        }
        $_SESSION['Admin'] = $_SERVER['REMOTE_ADDR'].'passwordHash'.password();
        return redirect('/');
    }

    public function changePassword(Request $request){
        if(sha1($request->input('oldPassword')) == password()){
            file_put_contents('pass.txt', sha1($request->input('newPassword')));
            return redirect('/');
        }   
        else{
            $err = 'סיסמה ישנה שגויה';
            return view('auth.changePassword', compact('err'));
        } 
    }
}
