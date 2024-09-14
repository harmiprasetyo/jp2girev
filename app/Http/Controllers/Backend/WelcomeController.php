<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $ctrl = 'welcome';
    private $title = 'Welcome';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $content_view = "backend.$this->ctrl.index";
		$data['page_title'] = $this->title;
        $data['menu'] = $this->ctrl;
        $data['sub_menu'] = "";
		$data['ctrl'] = $this->ctrl;

        return view($content_view, $data);
    }
}
