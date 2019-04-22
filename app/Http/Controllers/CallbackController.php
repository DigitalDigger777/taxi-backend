<?php

namespace App\Http\Controllers;

use App\Callback;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Callback::all();
        return response()->view('callbacks', ['items' => $items]);
    }

    /**
     * @param Request $request
     */
    public function save(Request $request)
    {
        $callback = new Callback();
        $callback->name = $request->get('name');
        $callback->phone = $request->get('phone');
        $callback->email = $request->get('email');

        $callback->save();
    }
}