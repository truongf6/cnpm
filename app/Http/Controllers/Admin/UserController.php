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

        return view($this->route_prefix.'index', [
            'users' => $users,
        ]);
    }


    public function create()
    {
        return view($this->route_prefix.'create');
    }


    public function store(StoreRequest $request)
    {
        $params = $request->validated();
        $params['password'] = md5($params['password']);

        $this->model->update($params);

        return redirect()->route($this->route_prefix.'index');
    }


    public function edit(User $user)
    {
        return view($this->route_prefix.'edit', [
            'user' => $user
        ]);
    }


    public function update(UpdateRequest $request, User $user)
    {
        $params = $request->validated();
        $params['password'] = md5($params['password']);

        $user->update($params);

        return redirect()->route($this->route_prefix.'index');
    }


    public function destroy(User $user)
    {

        if ($user->id == 1) {
            return redirect()->route($this->route_prefix.'index')
                        ->with('msg', 'Tài khoản quản trị không thể xóa')
                        ->with('type', 'error');
        }

        $user->deleted_at = Carbon::now();
        $user->update();

        return redirect()->route($this->route_prefix.'index');
    }
}
