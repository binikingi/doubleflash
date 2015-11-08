<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\servicesRequest;
use App\service;
use Input;
use App\servicePic;
use App\eventServices;
use App\info;

class serviceController extends Controller
{
    private $info;
    public function __construct(){
       $this->middleware('Admin', ['except' => ['index', 'show']]);
       $this->info = info::where('name', 'services')->get()[0];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/services/1');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(servicesRequest $request)
    {
        $important = 'true';
        if(empty($request->input('important')))
            $important = 'false';
        $name = rand(1000,9999);
        $request->file('pic1')->move('images/services/', $name.'.png');
        $service = service::create(['title'=>$request->input('title'), 'desc'=>$request->input('desc'), 'pic'=>'/images/services/'.$name.'.png', 'important'=>$important]);
        servicePic::create(['service_id' => $service->id, 'pic'=>'images/services/'.$name.'.png']);
        $count = 1;
        foreach($request->file() as $s){
            if($count != 1){
                $name = rand(1000,9999);
                $s->move('images/services/', $name.'.png');
                servicePic::create(['service_id' => $service->id, 'pic'=>'images/services/'.$name.'.png']);
            }
            $count++;
        }
        return redirect('services/'.$service->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wrapClass = 'fade';
        $service = service::find($id);
        if(empty($service))
            return redirect('/');
        $servicePics = servicePic::where('service_id', '=', $id)->get();
        $info = $this->info;
        return view('service.show', compact('service', 'servicePics', 'wrapClass', 'info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = service::find($id);
        if(empty($service))
            return redirect('/');
        $servicePic = servicePic::where('service_id', $id)->get();
        return view('service.edit', compact('service', 'wrapClass', 'servicePic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(servicesRequest $request, $id)
    {
        $service = service::find($id);
        $service->update($request->all());
        $service->save();
        $important = 'true';
        if(empty($request->input('important')))
            $important = 'false';
        $service->important = $important;
        $service->save();
        foreach($request->file() as $pic){
            $name = rand(1000,9999);
            $pic->move('images/services/', $name.'.png');
            servicePic::create(['service_id' => $id, 'pic'=>'images/services/'.$name.'.png']);
        }
        return redirect('/services/'.$service->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach(servicePic::where('service_id', $id)->get() as $s){
            unlink($s->pic);
            $s->delete();
        }
        foreach(eventServices::where('service_id', $id)->get() as $s){

            $s->delete();
        }
        service::find($id)->delete();
        return redirect('/');
    }

    public function deletepic(){
        $pic = servicePic::find($_GET['picId']);
        unlink($pic->pic);
        $pic->delete();
        echo 'ok';
    }
}