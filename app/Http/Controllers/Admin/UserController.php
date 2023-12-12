<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $model;
    private $route_prefix;

    function __construct() {
        $this->model = (new User())::query();
        $this->route_prefix = 'admin.users.';
    }

    public function index() {
        $users = $this->model->where('deleted_at')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $params['password'] = md5($params['password']);

        $this->model->update($params);

        return redirect()->route('admin.users.index');
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }


    public function update(UpdateRequest $request, User $user)
    {
        $params = $request->validated();
        $params['password'] = md5($params['password']);

        $user->update($params);

        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user)
    {

        if ($user->id == 1) {
            return redirect()->route('admin.users.index')
                        ->with('msg', 'Tài khoản quản trị không thể xóa')
                        ->with('type', 'error');
        }

        $user->deleted_at = Carbon::now();
        $user->update();

        return redirect()->route('admin.users.index');
    }
}
