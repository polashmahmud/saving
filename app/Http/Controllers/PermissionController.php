<?php

namespace App\Http\Controllers;

use App\Ability;
use Illuminate\Http\Request;
use Bouncer;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Ability::orderBy('category')->get();
        return view('permission.index', compact('permissions'));
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
        Ability::create([
            'name' => str_slug($request->name),
            'title' => $request->title,
            'category' => $request->category,
        ]);

        activity()->log('Create Permission');
        Session::flash('success', 'Success');
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
        $permission = Ability::find($id);
        return view('permission.edit', compact('permission'));
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
        $permission = Ability::find($id);
        $permission->name = $request->name;
        $permission->title = $request->title;
        $permission->category = $request->category;
        $permission->save();

        activity()->log('Edit Permission');
        Session::flash('success', 'Success');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Ability::find($id);
        $permission->delete();
        activity()->log('Delete Permission');
        Session::flash('success', 'Success');
        return redirect()->route('permission.index');
    }
}
