<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function execute() {

        if(view()->exists('admin.services')) {

            $services = \App\Service::all();

            $data = [
                        'title' => 'Services',
                        'services' => $services
                    ];

            return view('admin.services', $data);
        }

        abort(404);
        
    }
}
