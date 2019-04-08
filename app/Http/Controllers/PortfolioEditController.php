<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Validator;


class PortfolioEditController extends Controller
{
    //
    public function execute(Portfolio $portfolio, Request $request) {

        if($request->isMethod('delete')) {
            $portfolio->delete();
            return redirect('admin')->with('status', 'Portfolio deleted');
        }

        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, [
                                                    'name' => 'required|max:200',
                                                    'filter' => 'required|max:100'

                                                ]);
            if($validator->fails()) {
                return redirect()->route('portfolioEdit', ['portfolio' => $input['id']])->withErrors($validator);
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');

                $file->move(public_path().'/assets/img', $file->getClientOriginalName());


                $input['images'] = $file->getClientOriginalName();

            }
            else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $portfolio->fill($input);

            // dd($portfolio);

            if($portfolio->update()) {
                return redirect('admin')->with('status', 'portfolio updated');
            }
        }

        if(view()->exists('admin.portfolios_edit')) {

            $old = $portfolio->toArray();

            $data = [
                        'title' => 'Edit portfolio - '.$old['name'],
                        'data' => $old
                    ];
            return view('admin.portfolios_edit', $data);
        }
        else {
            abort(404);
        }
    }
}
