<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('created_at')
            ->where('id', '!=', auth()->user()->id)
            ->get();
    }
}
