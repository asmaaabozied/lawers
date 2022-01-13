<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'User')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::get()->pluck('name','id');



        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required_with:password|same:password',
           'email' => 'required|unique:users|email',
        ], [], ['name' => 'الاسم', 'email' => 'الايميل', 'phone' => 'الهاتف', 'password' => 'كلمه المرور', 'c_password' => 'تاكيد كلمه المرور ']);
        $client= User::create($request->except('password','c_password','roles') + ['type' => 'User']);
        $client['password']=bcrypt($request->password);
        $client->syncRoles($request->roles);

        $client->save();

        $this->actionSuccess();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::find($id);

        $roles=Role::get()->pluck('name','id');


        return view('users.show', compact('client','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::find($id);

        $roles=Role::get()->pluck('name','id');

        return view('users.edit', compact('client','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $client = User::find($id);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required_with:password|same:password',

            'email' => 'required|unique:users|email',
        ], [], ['name' => 'الاسم', 'email' => 'الايميل', 'phone' => 'الهاتف', 'password' => 'كلمه المرور', 'c_password' => 'تاكيد كلمه المرور ']);


        $client->update($request->except('password','c_password','roles'));

        $client['password']=bcrypt($request->password);
        if($request->roles){
            $client->syncRoles($request->roles);

        }

        $client->save();

        $this->actionSuccess();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $client = User::find($id);
        $client->delete();
        $this->actionSuccess();
        return back();
    }
}
