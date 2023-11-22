<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index() {
        return redirect()
                ->route('client.home.index')
                ->withCookie(cookie('userid', '', -1000 * 60))
                ->withCookie(cookie('fullname', '', -1000 * 60))
                ->withCookie(cookie('admin', '', -1000 * 60));
    }
}
