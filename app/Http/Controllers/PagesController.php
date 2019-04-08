<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function execute() {

        if(view()->exists('admin.pages')) {

            $pages = \App\Page::all();

            $data = [
                        'title' => 'Pages',
                        'pages' => $pages
                    ];

            return view('admin.pages', $data);
        }

        abort(404);
        
    }
}
