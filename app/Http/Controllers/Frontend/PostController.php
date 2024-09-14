<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Module;
use App\Post;
use App\Category;
use App\Menu;
use App\Member;
use App\ContactCooperate;
use App\ContactOtherInfo;
use App\ContactUs;
use Mail;
use Auth;
use \Swift_Mailer;
use \Swift_SmtpTransport as SmtpTransport;

class PostController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	/**
   * Display index page
   *
	 * @param  String $module_name 
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Module  $module
	 * @param  \App\Post  $post_model
	 * @return \Illuminate\Http\Response
   */
	public function index($module_name, Request $request, Module $module, Post $post_model, Menu $menu) 
	{
		// Get module properties from table
		$module = $module->getDetailByName($module_name);
		
		// Set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$pk = $module->table_id;
		$table_option = explode(",",$module->table_option);
		$table = $module->table_name;
		$current_menu = $menu->getDetail($module->menu);
		if($current_menu->parent!=0){
			$parent_menu = $menu->getDetail($module->menu_parent);
			$data[ 'content_view' ] = "frontend.$parent_menu->alias.$module_name";
			$data[ 'menu' ] = $parent_menu->alias;	
			$data[ 'parent_menu' ] = $parent_menu->name;	
		} else {
			$data[ 'content_view' ] = "frontend.$current_menu->alias.index";
			$data[ 'menu' ] = $current_menu->alias;	
			$data[ 'parent_menu' ] = '';	
		}
		
		// Instantiate model class
		$model_class = new $model;

		// Get data
		if($model=='App\Content')
		{
			$detail = $model_class->getDetailByModule($module->id);
			$data['detail'] = $detail;
		} 
		else 
		{
			$list = $model_class->getList();
			$data['list'] = $list;
		}		


		if($ctrl=='newsletter'){
			 $data['tahun_list'] = $model_class->getYearList();
			 $data['newsletter_model'] = $model_class;
		}

		if($ctrl=='report'){
			$data['tahun_list'] = $model_class->getYearList();
			$data['report_model'] = $model_class;
	 }
		
		// Set data view
		$data[ 'page_title' ] = $current_menu->name;
		$data[ 'ctrl' ] = $ctrl;
		$data[ 'title' ] = $current_menu->name;
		$data[ 'table_option' ] = $table_option;
		$data[ 'pk' ] = $pk;
			

		// load view
		return view( $data[ 'content_view' ], $data );
	}


	/*=== Detail Page ===*/
	public function detail($module_name, $id, Request $request, Module $module, Post $post_model)
	{	

		
			
		// Get module properties from table
		if($module_name=='project-status'){
			//$status_project = ProjectStatus::find($id);
			$module = $module->get_detail_by_name('project-profile');
		//	$id=$status_project->project_id;
			$data['project_status_list'] = ProjectStatus::where('project_id','=',$id)->get(); 
		}
		else
			$module = $module->getDetailByName($module_name);
		
	

		// Set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$pk = $module->table_id;
		$table_option = explode(",",$module->table_option);
		$table = $module->table_name;
		$menu = $module->menu;

		

		// Instantiate model class
		$model_class = new $model;

		// Get data
		$detail = $model_class->getDetail($id);

		// set data view
		if($module_name=='project-status')
			$data[ 'content_view' ] = "frontend.$module_name.detail";
		else
			$data[ 'content_view' ] = "frontend.publication.detail";
		$data[ 'page_title' ] = $title;
		$data[ 'ctrl' ] = $ctrl;
		$data[ 'title' ] = $title;
		$data[ 'table_option' ] = $table_option;
		$data[ 'pk' ] = $pk;
		$data[ 'detail' ] = $detail;
		$data[ 'menu' ] = $menu;
		if($ctrl=='project-profile'){
			$data['project_detail_list'] = ProjectDetail::where('project_id','=',$id)->get(); 
		}
		


		// load view
		return view( $data[ 'content_view' ], $data );
		
	}


	/*== Save Contact Member ==*/
	public function saveContactMember(Request $request, Member $member) 
	{
		try
		{
			// Get request data
			$id = $request->id_hf;

			if(empty($id)) // Create new
			{ 
				$data = new Member;
				$data->member_id = $data->generateID();
				$data->created_at = date("Y-m-d H:i:s");
				$data->created_by = 0;
				$message = "Data Anda telah kami terima, kami akan segera memprosesnya dan menghubungi Anda";
			} 
			else // Update 
			{ 
				$data = OrderLayanan::find($id);
				$message = "Data $this->title telah berhasil diupdate";
			}
				
			$data->first_name =  $request->name;
			$data->position = $request->position;
			$data->org_name = $request->org_name;
			$data->org_address = $request->org_address;
			$data->sector = $request->sector;
			$data->other_sector = $request->other_sector;
			$data->email = $request->email;
			$data->phone = $request->phone;
			$data->updated_at = date("Y-m-d H:i:s");
			$data->updated_by = 0;

			// Save data
			$data->save();

			// Send notification mail to admin
			// $datamail['name'] = "$request->first_name $request->last_name";
			// $datamail['member_id'] = $data->member_id;
			// $datamail['org_name'] =  $request->address;
			// $datamail['contact_person'] =  $request->contact_person;
			// $datamail['email'] =  $request->email;
			// $datamail['phone'] =  $request->phone;

			// $from = ENV('MAIL_FROM_ADDRESS');
			// $from_name = ENV('MAIL_FROM_NAME');
			// $to = ENV('MAIL_FROM_ADDRESS');
			// $to_name = ENV('MAIL_FROM_NAME');
			// $subject = "#WEB - Notifikasi Registrasi Member #".$data->member_id;

			// Mail::send(['html' =>'emails.member-notification'], $datamail, function($mail) use ($from,$from_name,$to,$to_name,$subject,$datamail){
			// 	$mail->to($to)
			// 			->replyTo($from, $from_name)
			// 			->subject($subject)
			// 			->from($from,$from_name);
			// });

			// Notification 
			$status = "success";
			Session::flash( 'status', $status );
			Session::flash( 'message', $message );

			// Redirect to list view
			return redirect(URL("web/pendaftaran-anggota"));
		}
		catch(\Exception $e)
		{
			// Notification 
			$status = "error";
			Session::flash( 'status', $status );
			Session::flash( 'message',  $e->getMessage() );

			// Back to form
			return back()->withInput();
		}
	}


	/*== Save Contact Us ==*/
	public function saveContactUs(Request $request, Member $member) 
	{
		try
		{
			// Get request data
			$id = $request->id_hf;

			if(empty($id)) // Create new
			{ 
				$data = new ContactUs;
				$data->created_at = date("Y-m-d H:i:s");
				$data->created_by = 0;
				$message = "Pesan Anda telah kami terima, kami akan segera memprosesnya dan menghubungi Anda";
			} 
			else // Update 
			{ 
				$data = ContactUs::find($id);
				$message = "Data $this->title telah berhasil diupdate";
			}
				
			$data->first_name =  $request->first_name;
			$data->last_name = $request->last_name;
			$data->title = $request->title;
			$data->email = $request->email;
			$data->category = $request->category;
			$data->content_short = $request->content_short;
			$data->updated_at = date("Y-m-d H:i:s");
			$data->updated_by = 0;

			// Save data
			$data->save();

			// Send email to admin
			$datamail['name'] = "$request->first_name $request->last_name";
			$datamail['email'] =   $request->email;
			$datamail['category'] =  getCategoryName($request->category);
			$datamail['title'] =  $request->title;
			$datamail['content_short'] =  $request->content_short;


			$from = $datamail['email'];
			$from_name = $datamail['name'];
			$to = ENV('MAIL_FROM_ADDRESS');
			$to_name = ENV('MAIL_FROM_NAME');
			$subject = "#WEB - $request->title";

			Mail::send(['html' =>'emails.contact-us'], $datamail, function($mail) use ($from,$from_name,$to,$to_name,$subject,$datamail){
				$mail->to($to)
						->replyTo($from, $from_name)
						->subject($subject)
						->from($from,$from_name);
			});
			

			// Notification 
			$status = "success";
			Session::flash( 'status', $status );
			Session::flash( 'message', $message );

			// Redirect to list view
			return redirect(URL("web/contact-us"));
		}
		catch(\Exception $e)
		{
			// Notification 
			$status = "error";
			Session::flash( 'status', $status );
			Session::flash( 'message',  $e->getMessage() );

			// Back to form
			return back()->withInput();
		}
	}


}