<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bouncer;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $admin = Bouncer::role()->create([
//            'name' => 'admin',
//            'title' => 'Administrator',
//        ]);
//
//        $ban = Bouncer::ability()->create([
//            'name' => 'ban-users',
//            'title' => 'Ban users',
//        ]);
//
//        Bouncer::allow($admin)->to($ban);

//        Bouncer::assign('admin')->to(Auth::user());

//        Bouncer::retract('admin')->from(Auth::user());
//        if (Bouncer::cannot('ban-users')) {
//            return 'abul';
//        }
//        if ( Bouncer::can('ban-users1')) {
//            return 'babul';
//        }


        return view('home');
    }
}
