<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\eventRequest;
use App\Http\Controllers\Controller;

use App\event;
use App\eventServices;
use App\service;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
       $this->middleware('Admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(eventRequest $request)
    {
        $event = event::create($request->all());
        foreach($request->input('service') as $key=>$val){
            eventServices::create(['event_id'=>$event->id, 'service_id'=>$val]);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = event::find($id);
        if(empty($event))
            return redirect('/');
        $eventServices = eventServices::where('event_id', $id)->get();
        $services;
        foreach($eventServices as $es)
            $services[] = $es->service_id;
        if(empty($services))
            $services = ['-1'];
        return view('event.edit', compact('event', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(eventRequest $request, $id)
    {
        $event = event::find($id);
        $event->update($request->all());
        foreach(eventServices::where('event_id', $id)->get() as $es)
            $es->delete();
        if(!empty($request->input('service'))){
            foreach($request->input('service') as $key=>$val){
                eventServices::create(['event_id'=>$event->id, 'service_id'=>$val]);
            }
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $event = event::find($id);
        foreach(eventServices::where('event_id', $id)->get() as $es)
            $es->delete();
        $event->delete();
        return redirect('/');
    }
}
