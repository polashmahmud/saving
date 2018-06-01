<?php

namespace App\Http\Controllers;

use App\Account;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with(['user:id,name','package'])->where('status', 0)->get();
//        return $accounts;
        return view('collection.index', compact('accounts'));
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
        $account = Account::find($request->account_id);
        $last_date = Collection::with('account:amount')->where('account_id', $request->account_id)->get()->last();
        $date = date('Y/m/d', strtotime("+1 day", strtotime($last_date->date)));

        if ($account->package->type == 2) {
            $amount = date('d', strtotime($date)) * $account->amount;
        } else {
            $amount = $account->amount;
        }

        $collection = new Collection;
        $collection->account_id = $request->account_id;
        $collection->collect_by = Auth::id();
        $collection->date = $date;
        $collection->amount = $amount;
        $collection->description = "জমা দিয়েছেন";
        $collection->save();

        Session::flash('success'. 'Success');
        activity()->log('Add Collection');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
