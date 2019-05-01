<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Mail\DriverMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return response()->view('drivers', ['items' => $drivers]);
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

        $files = [];
        for ($i = 0; $i < 8; $i++) {
            if ($request->hasFile('file' . $i)) {
                $file = 'file' . $i;
                $path = $request->file($file)->store('documents');
                $files[] = $path;
            }
        }

        Mail::to("korman.yuri@gmail.com")->send(new DriverMail($driver, $files));

    }
}
