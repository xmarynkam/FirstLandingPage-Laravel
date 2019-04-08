<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Page;

class PagesAddController extends Controller
{
    //
    public function execute(Request $request) {

        if($request->isMethod('post')) {

            // Get an array of data request except field _token
            $input = $request->except('_token');

            $massages = [
                            'required' => "Поле :attribute обов'язково має бути заповненим",
                            'unique' => 'Поле :attribute має бути унікальним'
                        ];

            $validator = Validator::make($input, [
                                                    'name' => 'required|max:100',
                                                    'alias' => 'required|unique:pages|max:100',
                                                    'text' => 'required'
                                                ], $massages);

            if($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);
            }

            $page = new Page;

            $page->fill($input);

            if($page->save()) {
                return redirect('admin')->with('status', 'Page added');
            }
            
        }

        if(view()->exists('admin.pages_add')) {

            $data = [
                        'title' => 'Addition Page'
                    ];

            return view('admin.pages_add', $data);
        }

        abort(404);
        
    }
}
