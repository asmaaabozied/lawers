<?php

namespace App\Http\Controllers;

use App\model\Lawercase;
use App\Model\LawyerCase;
use App\model\Statuscase;
use App\Model\Type;
use App\Models\Permission;
use App\Role;
use http\Client;
use Illuminate\Http\Request;

class RoleController extends Controller
{


//    public function __construct()
//    {
//        //create read update delete
//        $this->middleware(['permission:read_roles'])->only('index');
//        $this->middleware(['permission:create_roles'])->only('create');
//        $this->middleware(['permission:update_roles'])->only('edit');
//        $this->middleware(['permission:delete_roles'])->only('destroy');
//
//    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::get();

        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
$models=['users','Typessesiot','cases','lawyers','sessiot','Client','courts','Decision','Expense','Lawercase','Stage','roles','Dstatement','Statuscase','Typecourt','Typecases','payment','document'];
        $maps=['create','update','read','delete'];
        return view('roles.create',compact('models','maps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name'=>'required',
            'description'=>'required',

        ], [], [
            'name'=>'الاسم',

            'display_name' => 'الاسم المعروض',

        ]);
//dd($request->all());
        $role=Role::create($request->except('permissions','_token'));

//        $permission=Permission::create(['name'=>'asmaa','display_name'=>'asmaa','description'=>'dfdvfdrst']);

        $role->attachPermissions($request->permissions);

        $this->actionSuccess();


       return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::find($id);
        $models=['cases','lawyers','sessiot'];
        $maps=['create','update','read','delete'];

        return view('roles.show', compact('role','models','maps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::find($id);

        $models=['cases','lawyers','sessiot'];
        $maps=['create','update','read','delete'];


        return view('roles.edit', compact('role','models','maps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role=Role::find($id);

        $request->validate([
            'name' => 'required',
            'display_name'=>'required',
            'description'=>'required',

        ], [], [
            'name'=>'الاسم',

            'display_name' => 'الاسم المعروض',

        ]);
        $role->update($request->except('permissions','_token'));
        $role->syncPermissions($request->permissions);

        $this->actionSuccess();

        return redirect()->route('case.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LawyerCase $lawyerCase
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role=Role::find($id);

        $role->delete();
        $this->actionSuccess();
        return back();
    }
}
