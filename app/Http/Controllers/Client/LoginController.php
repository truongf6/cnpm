<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Login\ProcessLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        if ($request->cookie('userid')) {
            return redirect()
                    ->route('client.home.index')
                    ->with('msg', 'Bạn đã đăng nhập')
                    ->with('type', 'warning');
        }

        return view('client.login.index');
    }

    public function processLogin(ProcessLoginRequest $request) {
        $params = $request->validated();
        $user = User::query()
                    ->where('isActive', true)
                    ->where('deleted_at')
                    ->where('username', $params['username'])
                    ->first();
        if ($user) {
            if ($user->password === md5($params['password'])) {
                return redirect()
                        ->route('client.home.index')
                        ->withCookie(cookie('userid', $user->id, 6000 * 60 * 24))
                        ->withCookie(cookie('fullname', $user->fullname, 6000 * 60 * 24))
                        ->withCookie(cookie('admin', $user->admin, 6000 * 60 * 24));
            }
        }

        return redirect()
                ->route('client.login.index')
                ->with('msg', 'Tài khoản hoặc mật khẩu không đúng')
                ->with('type', 'error');
    }
}
