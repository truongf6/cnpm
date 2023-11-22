<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Client\Register\StoreRequest;
use App\Models\User;

class RegisterController extends Controller
{

    public function index() {
        return view('client.register.index');
    }

    public function store(StoreRequest $request) {
        $params = $request->validated();
        $params['password'] = md5($params['password']);
        User::create($params);

        return redirect()
                ->route('client.login.index')
                ->with('msg', 'Đăng ký thành công!')
                ->with('type', 'success');
    }
}
