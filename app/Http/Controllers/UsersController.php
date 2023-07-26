<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->withCount('messagesWithCurrentUser')->get();
        return view('users.index', compact('users'));
    }
}
