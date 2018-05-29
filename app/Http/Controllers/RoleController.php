<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Bouncer;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Ability::all();
        $permission_role = DB::table('assigned_roles')
            ->select(DB::raw('CONCAT(role_id,"-",entity_id) AS detail'))
            ->pluck('detail')->toArray();

        return view('role.index', compact('roles', 'col_heads_role', 'permissions', 'permission_role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = str_slug($request->name);
        $role->title = $request->name;
        $role->save();

        Session::flash('success', 'Success');
        activity()->log('Create Role');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        Session::flash('success', 'Success');
        activity()->log('Delete Role');
        return back();
    }

    public function savePermission(Request $request)
    {
        $input = $request->all();
        $permissions = array_get($input, 'permission');

        DB::table('assigned_roles')->truncate();

        if($permissions != '') {

            foreach($permissions as $r_key => $permission){
                foreach($permission as $p_key => $per){
                    $values[] = $p_key;
                }

                $role = Role::find($r_key);

                if(count($values))
//                    $role->permissions()->attach($values);
                    Bouncer::assign($role)->to($values);
                unset($values);
            }
        }

        Session::flash('success', 'Success');
        activity()->log('Change Role Permission');
        return back();
    }
}
