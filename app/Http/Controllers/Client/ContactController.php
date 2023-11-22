<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Client\Contact\StoreRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    private $model;
    private $route;

    function __construct() {
        $this->model = (new Contact())::query();
        $this->route = 'client.contact.';
    }

    public function index() {
        return view('client.contact.index');
    }

    public function store(StoreRequest $request) {
        $this->model->create($request->validated());

        return view('client.contact.index')->with('msg', 'Liên hệ thành công!');
    }
}
