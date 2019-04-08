<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;

class ServiceAddController extends Controller
{
    //
    public function execute(Request $request) {

        if($request->isMethod('post')) {

            // Get an array of data request except field _token
            $input = $request->except('_token');
        

            $massages = [
                            'required' => "Поле :attribute обов'язково має бути заповненим"
                        ];

            $validator = Validator::make($input, [
                                                    'name' => 'required|max:100',
                                                    'text' => 'required'
                                                ], $massages);

            if($validator->fails()) {
                return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
            }
            

            $service = new Service;

            $service->fill($input);

            if($service->save()) {
                return redirect('admin')->with('status', 'Service added');
            }



        }



        if(view()->exists('admin.services_add')) {

                $data = [
                            'title' => 'Addition Service'
                        ];

                return view('admin.services_add', $data);
        }

        abort(404);
    }
}
?>