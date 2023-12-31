<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\ManagementAccess\Permission;
use Illuminate\Http\Request;


// use Request here
use App\Http\Requests\Role\{StoreRoleRequest, UpdateRoleRequest};
// use App\Http\Requests\Role\UpdateRoleRequest;

// use models here
use App\Models\ManagementAccess\Role;
use App\Models\ManagementAccess\RoleUser;

// use needed
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::orderBy('created_at', 'desc')->get();
        // $role = Role::all()->load('permission');


        // return response($role);
        return response()->view('pages.backsite.management-access.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());

        alert()->success('Success Message', 'Successfully added new role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $data = $role->query()->where('id', $role->id());

        // load untuk ambil relasi di data tunggal
        $role->load('permission');

        // sedangkan with digunankan untuk ambil data relasi dengan jumlah banyak sekaligus
        // $data = $role->with('permission')->get();

        // return response($data);

        return response()->view('pages.backsite.management-access.role.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // get all permission
        $permission = Permission::all();

        // get data relation from $role , this will be use to validate input ( maybe )
        $role->load('permission');


        // $isi = count($role->permission);

        // return response($role);
        return response()->view('pages.backsite.management-access.role.edit', compact('role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        // get all data from request frontend
        $data = $request->all();

        $role->update($data);
        // syncronice  permisssion data from input request
        $role->permission()->sync($request->input('permission', []));

        alert()->success('Success Message', 'Successfully update role');
        return redirect()->route('backsite.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->forceDelete();

        alert()->success('Success Message', 'Successfully deleted role');
        return redirect()->back();
    }
}
