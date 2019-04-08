<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Portfolio;

class PortfolioAddController extends Controller
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
                                        'name' => 'required|max:200',
                                        'filter' => 'required|max:100'
                                    ], $massages);
            if($validator->fails()) {
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);
            }

            $portfolio = new Portfolio;

            $portfolio->fill($input);

            if($portfolio->save()) {
                return redirect('admin')->with('status', 'Portfolio added');
            }


    	}

    	if(view()->exists('admin.portfolio_add')) {

            $data = [
                        'title' => 'Addition Portfolio'
                    ];

            return view('admin.portfolio_add', $data);
        }

        abort(404);
    }
}
