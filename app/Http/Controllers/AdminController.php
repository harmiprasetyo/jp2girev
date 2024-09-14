<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{

    private $ctrl = 'admin';

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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileForm()
    {
        $user = Auth::user();
        // set data view
		$data[ 'content_view' ] = "backend.admin.user-form";
		$data[ 'page_title' ] = "Edit Profile";
        $data[ 'ctrl' ] = $this->ctrl;
        $data[ 'menu' ] = "user";
        $data[ 'detail' ] = $user;

		// load view
		return view( $data[ 'content_view' ], $data );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordForm()
    {
        $user = Auth::user();
        // set data view
		$data[ 'content_view' ] = "backend.admin.password-form";
		$data[ 'page_title' ] = "Edit Password";
        $data[ 'ctrl' ] = $this->ctrl;
        $data[ 'menu' ] = "user";
        $data[ 'detail' ] = $user;

		// load view
		return view( $data[ 'content_view' ], $data );
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function storeProfile(Request $request) 
	{
		// set param
		$id = $request->id;
        $user = Auth::user();
        $id = $user->id;

        // update
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->updated_at = date("Y-m-d H:i:s");
		
		// save
		$data->save();

		// notification 
		$status = "success";
		$message = "Data telah berhasil disimpan";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
        
        Auth::logout();

		// redirect page
		return redirect(URL('admin'));

    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	public function storePassword(Request $request) 
	{
		// set param
		$id = $request->id;
        $user = Auth::user();
        $id = $user->id;

        // update
        $data = Admin::find($id);
        $data->password  = bcrypt(request('password'));
        $data->updated_at = date("Y-m-d H:i:s");
		
		// save
		$data->save();

		// notification 
		$status = "success";
		$message = "Data telah berhasil disimpan";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
        
        //Auth::logout();

		// redirect page
		return redirect(URL('admin'));

	}
}
