<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;

class ServiceEditController extends Controller
{
    //
    public function execute(Request $request, $id) {

        $service = Service::find($id);
        
        if($request->isMethod('delete')) {
            $service->delete();
            return redirect('admin')->with('status', 'service deleted');
        }
        // нижній рядок це те ж саме що service $service, ларавель сам витягує потрібну модель по переданому id
        // $service = service::find($id);

        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $massages = [
                            'required' => "Поле :attribute обов'язково має бути заповненим"
                        ];

            $validator = Validator::make($input, [
                                                    'name' => 'required|max:100',
                                                    'text' => 'required',
                                                    'icon' => 'required'

                                                ], $massages);
            if($validator->fails()) {
                return redirect()->route('servicesEdit', ['service' => $input['id']])->withErrors($validator);
            }

            $service->fill($input);

            if($service->update()) {
                return redirect('admin')->with('status', 'service updated');
            }

            // dd($input);
        }

        $old = $service->toArray();

        if(view()->exists('admin.services_edit')) {

            $data = [
                        'title' => 'Edit service - '.$old['name'],
                        'data' => $old
                    ];
            return view('admin.services_edit', $data);
        }
        else {
            abort(404);
        }
        

    }
}
