<?php

namespace App\Http\Controllers;

use App\Account;
use App\Classes\Helper;
use App\Collection;
use App\Http\Requests\AccountRequest;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::with(['user:id,name,phone','package:id,name,amount,type'])->get();

        $token = csrf_token();
        $col_data = array();
        $col_heads = array(
            trans('messages.Avatar'),
            trans('messages.Member Name'),
            trans('messages.Member Phone'),
            trans('messages.Package Name'),
            trans('messages.Package Amount'),
            trans('messages.Package Type'),
            trans('messages.Package Start Date'),
            trans('messages.Period Amount'),
            trans('messages.Status'),
            trans('messages.Option')
        );

        $col_footers = array(
            trans('messages.Avatar'),
            trans('messages.Member Name'),
            trans('messages.Member Phone'),
            trans('messages.Package Name'),
            trans('messages.Package Amount'),
            trans('messages.Package Type'),
            trans('messages.Package Start Date'),
            trans('messages.Period Amount'),
            trans('messages.Status'),
            trans('messages.Option')
        );

        foreach ($accounts as $account) {
            $delete_form = route('account.destroy', $account->id);
            $edit_form = route('account.edit', $account->id);
            $col_data[] = array(
                Helper::accountUserImage($account->user->getFirstMediaUrl('avatar', 'small')),
                $account->user->name,
                $account->user->phone,
                $account->package->name,
                $account->package->amount,
                $account->package->type,
                $account->date,
                $account->amount,
                $account->status ? 'Done' : 'Running',
                "<a href=\"$edit_form\" class='btn btn-default btn-xs m-r-5'><i class=\"ti-pencil-alt color-success\"></i></a> " .
                Helper::delete_form($delete_form, $account->id, $token)
            );
        }

//        return $col_data;

        return view('account.index', compact('col_heads', 'col_footers', 'col_data'));
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
    public function store(AccountRequest $request)
    {
        $package = Package::find($request->package_id);

        $account = new Account;
        $account->create_by = Auth::id();
        $account->user_id = $request->user_id;
        $account->package_id = $request->package_id;
        $account->date = $request->date;
        $account->amount = $request->amount;
        $account->status = 0;
        $account->save();

        if ($package->type == 0) {
            $collection = new Collection;
            $collection->account_id = $account->id;
            $collection->collect_by = Auth::id();
            $collection->date = $account->date;
            $collection->amount = -($package->amount);
            $collection->description = "লোন নিয়েছেন";
            $collection->save();
        } else {
            $collection = new Collection;
            $collection->account_id = $account->id;
            $collection->collect_by = Auth::id();
            $collection->date = $account->date;
            $collection->amount = 0;
            $collection->description = 'নতুন একাউন্ট';
            $collection->save();
        }

        activity()->log('Create Account');
        Session::flash('success', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        $users = User::where('status', 1)->get();
        $packages = Package::all();
        return view('account.edit', compact('account', 'users', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account->date = $request->date;
        $account->amount = $request->amount;
        $account->save();

        activity()->log('Edit Account');
        Session::flash('success', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        activity()->log('Delete Account');
        Session::flash('success', 'Success');
        return back();
    }
}
