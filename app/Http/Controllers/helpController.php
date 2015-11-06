<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\helpRequest;
use App\Http\Controllers\Controller;

use App\help;

class helpController extends Controller
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
        return redirect('/help/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('help.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(helpRequest $request)
    {
        $name = rand(1000,9999);
        $request->file('img')->move('images/helps/', $name.'.png');
        $help = help::create(['img' => 'images/helps/'.$name.'.png', 'content' => $request->input('content'), 'link' => $request->input('link')]);
        return redirect('/help/'.$help->id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/help/'.$id.'/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $help = help::find($id);
        if(empty($help))
            return redirect('/');
        return view('help.edit', compact('help'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(helpRequest $request, $id)
    {
        $help = help::find($id);
        $help->update($request->all());
        return redirect('/contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $help = help::find($id);
        unlink($help->img);
        $help->delete();
        return redirect('/');
    }
}
