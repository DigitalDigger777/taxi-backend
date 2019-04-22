<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        return response()->view('drivers');
    }

    public function save(Request $request)
    {
        $driver = new Driver();
        $driver->first_name = $request->get('first_name');
        $driver->last_name = $request->get('last_name');
        $driver->middle_name = $request->get('middle_name');
        $driver->city = $request->get('city');
        $driver->phone = $request->get('phone');
        $driver->email = $request->get('email');

        $driver->save();
    }
}
