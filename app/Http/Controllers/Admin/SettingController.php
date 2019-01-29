<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => Setting::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');
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
            'sitename' => 'required',
            'siteurl' => 'required',
            'sitedescription' => 'required',
            'sitekeywords' => 'required',
            'sitelogo' => 'image',
            'amountnews' => 'digits_between:1,100',
            'binorg' => 'digits:12|',
            'bankbik' => 'size:8',
            'bankrs' => 'alpha_num|size:20',
            'bankkbe' => 'digits:2',
            'rowdec' => 'numeric',
            'rowam' => 'numeric',
            'userampass' => 'numeric',
            'userampay' => 'numeric',
            'userampays' => 'numeric',
            'daysoffpays' => 'numeric'
        ]);

        $setting = Setting::add($request->all());

        $setting->uploadImage($request->file('sitelogo'));

        $setting->toggleOnSite($request->get('offsite'));
        $setting->toggleOffpays($request->get('offpays'));
        $setting->toggleOffrow($request->get('offrow'));

        return redirect()->route('admin.settings.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::find($id);
        return view('admin.settings.edit', ['settings' => $setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.settings.edit', ['settings' => $setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sitename' => 'required',
            'siteurl' => 'required',
            'sitedescription' => 'required',
            'sitekeywords' => 'required',
            'sitelogo' => 'image',
            'amountnews' => 'digits_between:1,100',
            'binorg' => 'digits:12|',
            'bankbik' => 'size:8',
            'bankrs' => 'alpha_num|size:20',
            'bankkbe' => 'digits:2',
            'rowdec' => 'numeric',
            'rowam' => 'numeric',
            'userampass' => 'numeric',
            'userampay' => 'numeric',
            'userampays' => 'numeric',
            'daysoffpays' => 'numeric'
        ]);

        $setting = Setting::find($id);

        $setting->edit($request->all());

        $setting->uploadImage($request->file('sitelogo'));
        $setting->toggleOnSite($request->get('offsite'));
        $setting->toggleOffpays($request->get('offpays'));
        $setting->toggleOffrow($request->get('offrow'));

        return redirect()->route('admin.settings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);
        return redirect()->route('admin.settings.index');
    }
}
