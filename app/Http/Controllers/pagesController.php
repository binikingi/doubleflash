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
use App\Http\Requests\contactRequest;


class pagesController extends Controller
{
    function __construct(){
        $this->middleware('Admin', ['only'=>['editIndex']]);
    }
    
    public function index(){
    	$services = service::all();
    	$events = event::all();
    	$servicePic = servicePic::all();
        $content = nl2br(file_get_contents('home.txt'));
    	return view('pages.index', compact('services', 'events', 'servicePic', 'content'));
    }

    public function editIndex(){
        $text = file_get_contents('home.txt');
        return view('pages.edit', compact('text'));
    }

    public function saveEdit(Request $request){
        if(file_put_contents('home.txt', $request->input('content')))
            return redirect('/');
        else return 'אירעה שגיאה';
    }

    public function contact(){
        $helps = help::all();
    	$events = event::all();
    	$services = service::all();
    	return view('pages.contact', compact('helps', 'events', 'services'));
    }

    public function contactId($id){
        $helps = help::all();
    	$events = event::all();
    	$services = service::all();
    	$checkServiceArray = eventServices::where('event_id', $id)->get();
    	$checkService;
    	$currEvent = event::find($id);
    	foreach($checkServiceArray as $check)
    		$checkService[] = $check->service_id;
    	if(!empty($currEvent))
    		return view('pages.contact', compact('helps', 'events', 'services', 'checkService', 'currEvent'));
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
        if($pass != $_ENV['ADMIN_PASSWORD']){
            $err = 'סיסמה שגויה';
            return view('auth.login', compact('err'));
        }
        $_SESSION['Admin'] = $_SERVER['REMOTE_ADDR'].'passwordHash'.$_ENV['ADMIN_PASSWORD'];
        return redirect('/');
    }
}
