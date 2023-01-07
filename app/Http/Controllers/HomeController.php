<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User_Role;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user_role = User_Role::where('user_id', $user->id)->first();
        $user_role->role = Role::where('id', $user_role->role_id)->first();

        if ($user_role->role->name == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user_role->role->name == 'user') {
            return redirect()->route('index');
        }

    }
}
