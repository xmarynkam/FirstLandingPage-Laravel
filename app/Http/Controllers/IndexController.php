<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Service;
use App\People;
use App\Portfolio;

use DB;
use Mail;

class IndexController extends Controller
{
    //
    public function execute (Request $request) {

        if($request->isMethod('post')) {
            //
            $massages = [
                            'required' => "Поле :attribute обовязково має бути заповненим",
                            'email' => "Поле :attribute повинно відповідти формату email-адреси",
                            'max' => "Поле :attribute не може бути довшим за :max"
                        ];
            $this->validate($request, [
                                        'name' => 'required|max:50',
                                        'email' => 'required|email',
                                        'text' => 'required'
                                        ], $massages);

            $data = $request->all();


            // Send massage on the mail
            Mail::send('site.email', ['data' => $data], function($massage) use ($data) {

                $mail_admin = env('MAIL_USERNAME');


                $massage->from($data['email'], $data['name']);
                $massage->to($mail_admin)->subject('Question');

            });

           

            if(!count(Mail::failures()) > 0) {

                return redirect()->route('home')->with('status', 'Email is send');
            }
        }



        // Get the relevant data from the database
        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();


        // Get unique values from the database
        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        // Create a menu for the header of the site
        $menu = array();

        // Menu items are derived from the database
        foreach ($pages as $page) {
            $item = array('title' => $page->name, 'alias' => $page->alias);

            array_push($menu, $item);
        }

        // Menu items for static sections of the site
        // Section for menu item: Services
        $item = array('title' => 'Services', 'alias' => 'service');
        array_push($menu, $item);

        // Section for menu item: Portfolio
        $item = array('title' => 'Portfolio', 'alias' => 'Portfolio');
        array_push($menu, $item);

        // Section for menu item: Team
        $item = array('title' => 'Clients', 'alias' => 'clients');
        array_push($menu, $item);

        // Section for menu item: Team
        $item = array('title' => 'Team', 'alias' => 'team');
        array_push($menu, $item);

        // Section for menu item: Contact
        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);

        return view('site.index', array(
                                            'menu' => $menu,
                                            'pages' => $pages,
                                            'services' => $services,
                                            'portfolios' => $portfolios,
                                            'peoples' => $peoples,
                                            'tags' => $tags,
                                        ));
    }
}
?>