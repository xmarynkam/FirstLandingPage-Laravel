<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //

    public function execute() {

    	$portfolios = \App\Portfolio::all();

    	$data = [
                    'title' => 'Portfolios',
                    'portfolios' => $portfolios
                    ]; 

    	if(view()->exists('admin.portfolio')) {
            return view('admin.portfolio', $data);
        }
        else {
            abort(404);
        }
    }
}
