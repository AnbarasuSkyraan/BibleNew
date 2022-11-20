<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Version;
use App\Models\Book;
use App\Models\Record;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        return view('user.login');
    }
    public function Registration(Request $request)
    {
        return view('user.registration');
    }
}
