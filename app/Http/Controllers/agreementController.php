<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\info;
use App\agreement;
use App\Http\Requests\agreementRequest;

class agreementController extends Controller
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
        $info = info::where('name', 'agreement')->limit(1)->get()[0];
        $agreements = agreement::all();
        return view('agreement.index', compact('agreements', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agreement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(agreementRequest $request)
    {
        agreement::create($request->all());
        return redirect('/agreement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/agreement');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $line = agreement::find($id);
        if(empty($line))
            return redirect('/agreement');
        return view('agreement.edit', compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(agreementRequest $request, $id)
    {
        $line = agreement::find($id);
        $line->update($request->all());
        return redirect('/agreement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        agreement::find($id)->delete();
        return redirect('/agreement');
    }
}
