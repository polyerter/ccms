<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [ 'users' => User::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => 'required|unique:users',
            'password' => 'required',
            'familiya' => 'required',
            'imya' => 'required',
            'phone' => 'required',
            'birthday' => 'required|date',
            'housing' => 'required|numeric',
            'numberdoc' => 'required',
            'datesoc' => 'required|date',
        ]);



        $users = User::add($request->all());

        $users->generatePassword($request->get('password'));
        $users->toggleInhabited($request->get('inhabited'));
        $users->toggleArchive($request->get('archive'));
        $users->toggleStatus($request->get('status'));
        $users->toggleRowup($request->get('rowup'));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.view', ['users' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['users' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $user = User::find($id);

        $this->validate($request, [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id) // todo разобраться с этой валидацией, не валидирует и дает ошибку
            ],
            'familiya' => 'required',
            'imya' => 'required',
            'phone' => 'required',
            'birthday' => 'required|date',
            'housing' => 'required|numeric',
            'numberdoc' => 'required',
            'datesoc' => 'required|date',
        ]);


        $user -> edit($request->all());

        $user->generatePassword($request->get('password'));
        $user->toggleInhabited($request->get('inhabited'));
        $user->toggleArchive($request->get('archive'));
        $user->togglestatus($request->get('status'));
        $user->toggleRowup($request->get('rowup'));

        return redirect()->route('admin.users.index');
    }
    /**
     * todo Set role user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role($id){

        $user = User::find($id);
        return view('admin.users.role.role', ['users' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}
