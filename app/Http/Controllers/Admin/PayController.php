<?php

namespace App\Http\Controllers\Admin;

use App\Pay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.pays.index', [ 'pays' => Pay::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.pays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        Pay::create($request->all());

        return redirect()->route('admin.pays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay = Pay::find($id);
        return view('admin.settings.pays.edit', ['pays' => $pay]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = Pay::find($id);
        return view('admin.settings.pays.edit', ['pay' => $pays]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $pays = Pay::find($id);
        $pays -> update($request->all());

        return redirect()->route('admin.pays.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pay::destroy($id);
        return redirect()->route('admin.pay.index');
    }
}
