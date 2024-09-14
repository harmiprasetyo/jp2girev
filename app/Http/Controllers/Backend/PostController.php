<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Module;
use App\Post;
use App\Category;
use App\Project;
use App\Menu;
use App\Article;
use Mail;

class PostController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
			$this->middleware('auth:admin');
	}

	/*== List Data ==*/
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
			$data[ 'menu' ] = $parent_menu->alias;	
		} else {
			$data[ 'menu' ] = $current_menu->alias;	
		}

		// Instantiate model class
		$model_class = new $model;

		// Get data
		if($model=='App\Content')
		{
			$detail = $model_class->getListDetail($module->id);
			$data['list'] = $detail;
		} 
		else 
		{
			$list = $model_class->getList();
			$data['list'] = $list;
		}		
		
		// Set data view
		$data[ 'content_view' ] = "backend.template.index";
		$data[ 'page_title' ] = $current_menu->name;
		$data[ 'ctrl' ] = $ctrl;
		$data[ 'title' ] = $current_menu->name;
		$data[ 'table_option' ] = $table_option;
		$data[ 'pk' ] = $pk;

		// load view
		return view( $data[ 'content_view' ], $data );

	}


	/*=== Detail Page ===*/
	public function detail($id)
	{	
		// init data
		$detail = News::find($id);
		
		// set data for view
		$data['content_view'] = "backend.$ctrl.detail";
		$data['detail'] = $detail;
		
		// load view
		return view( $data[ 'content_view' ], $data );
		
	}


	/*== Create Page ==*/
	public function create($module_name, Request $request, Module $module, Category $category, Menu $menu_model) 
	{

		// Get module properties from table
		$module = $module->getDetailByName($module_name);
		
		// Set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$pk = $module->table_id;
		$table_option = explode(",",$module->table_option);
		$data_option = explode(",",$module->data_option);
		$table = $module->table_name;
		$current_menu = $menu_model->getDetail($module->menu);
		if($current_menu->parent!=0){
			$parent_menu = $menu_model->getDetail($module->menu_parent);
			$data[ 'menu' ] = $parent_menu->alias;	
		} else {
			$data[ 'menu' ] = $current_menu->alias;	
		}
		if(in_array("category", $data_option)){
			$category_list = Category::where('module','=',$module->module_id)->get();
			$data['category_list'] = $category_list;
		}
		if(in_array("menu", $data_option)){
			$menu_list = $menu_model->getList(1);
			$data['menu_list'] = $menu_list;
		}
		if(in_array("article", $data_option)){
			$article_list = Article::orderBy('created_at','DESC')->get();
			$data[ 'article_list' ] = $article_list;
		}
		
		// set data view
		$data[ 'content_view' ] = "backend.template.form";
		$data[ 'page_title' ] = "Tambah ".$current_menu->name;
		$data[ 'ctrl' ] = $ctrl;
		$data[ 'title' ] = $title;
		$data[ 'data_option' ] = $data_option;
		//$data[ 'module_list' ] = $module_list;

		// load view
		return view( $data[ 'content_view' ], $data );

	}


	/*== Update Form ==*/
	public function update($module_name, $id, Request $request, Module $module,  Menu $menu_model) 
	{
		// Get module properties from table
		$module = $module->getDetailByName($module_name);

		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$pk = $module->table_id;
		$table_option = explode(",",$module->table_option);
		$data_option = explode(",",$module->data_option);
		$table = $module->table_name;
		$current_menu = $menu_model->getDetail($module->menu);
		if($current_menu->parent!=0){
			$parent_menu = $menu_model->getDetail($module->menu_parent);
			$data[ 'menu' ] = $parent_menu->alias;	
		} else {
			$data[ 'menu' ] = $current_menu->alias;	
		}
		if(in_array("category", $data_option)){
			$category_list = Category::where('module','=',$module->module_id)->get();
			$data['category_list'] = $category_list;
		}
		if(in_array("menu", $data_option)){
			$menu_list = $menu_model->getList(1);
			$data['menu_list'] = $menu_list;
		}
		if(in_array("article", $data_option)){
			$article_list = Article::orderBy('created_at','DESC')->get();
			$data[ 'article_list' ] = $article_list;
		}

		// instantiate model class
		$model_class = new $model;
		// get detail
		$detail = $model_class->getDetail($id);
	
		// set data view
		$data[ 'content_view' ] = "backend.template.form";
		$data[ 'page_title' ] = "Edit ".$current_menu->name;
		$data[ 'ctrl' ] = $ctrl;
		$data[ 'title' ] = $title;
		$data[ 'detail' ] = $detail;
		$data[ 'pk' ] = $pk;
		$data[ 'data_option' ] = $data_option;

		// load view
		return view( $data[ 'content_view' ], $data );

	}


	/*== Save ==*/
	public function save($module_name, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->getDetailByName($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->data_option);
		

		// set param
		$id = $request->id;
		
		// cek data
		if($id=="") 
		{
			// create new
			$data = new $model;
			$data->created_by = 1;//Session::get('user_id');
			$data->created_at = date("Y-m-d H:i:s");
			$data->updated_by = 1;//Session::get('user_id');
			$data->updated_at = date("Y-m-d H:i:s");
			if($ctrl=='news'){
				$data->headline='';
			}
		} 
		else 
		{
			// update
			$data = $model::find($id);
			$data->updated_by = 1;//Session::get('user_id');
			$data->updated_at = date("Y-m-d H:i:s");
			
				
		}

		if($ctrl=='news'){
			$data->from_wp=0;
		}


		if(in_array("image", $data_option))
		{
			if($request->file('image')!="")
			{
				// destination path
				$destination_path = public_path("images/$ctrl/");

				// upload foto profil
				$file_foto = $request->file('image');
				$md5_name = uniqid().md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->image = "$md5_name.$ext";
					
			}

			if($request->file('image_en')!="")
			{
				// destination path
				$destination_path = public_path("images/$ctrl/");

				// upload foto profil
				$file_foto = $request->file('image_en');
				$md5_name = "en-".uniqid().md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->image_en = "$md5_name.$ext";
					
			}
		}

		if(in_array("file", $data_option))
		{
			if($request->file('file')!="")
			{
				// destination path
				$destination_path = public_path('docs/'.$ctrl.'/');

				// upload foto profil
				$file_foto = $request->file('file');
				$md5_name = $request->title."-".uniqid();//.md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->file = "$md5_name.$ext";
				
			}

			if($request->file('file_en')!="")
			{
				// destination path
				$destination_path = public_path('docs/'.$ctrl.'/');

				// upload foto profil
				$file_foto = $request->file('file_en');
				$md5_name =  $request->title."-En-".uniqid();//.md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->file_en = "$md5_name.$ext";
				
			}

		}

		if(in_array("video_file", $data_option))
		{
			if($request->file('video_file')!="")
			{
				// destination path
				$destination_path = public_path('videos/'.$ctrl.'/');

				// upload foto profil
				$file_foto = $request->file('video_file');
				$md5_name = uniqid().md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->video_file = "$md5_name.$ext";
				
			}


			if($request->file('video_file_en')!="")
			{
				// destination path
				$destination_path = public_path('videos/'.$ctrl.'/');

				// upload foto profil
				$file_foto = $request->file('video_file_en');
				$md5_name = "en-".uniqid().md5_file($file_foto->getRealPath());
				$ext = $file_foto->getClientOriginalExtension();
				$file_foto->move($destination_path,"$md5_name.$ext");

				//set data
				$data->video_file_en = "$md5_name.$ext";
				
			}
		}

		// set data
		
		// set data
		if(in_array("category", $data_option)){
			$data->category = $request->category;
		}

		if(in_array("article", $data_option)){
			$data->article = $request->article;
		}


		if(in_array("event_date", $data_option)){
			$data->start_date = $request->date_start;
			$data->end_date = $request->date_end;
		}


		if(in_array("date", $data_option)){
			$data->date = $request->date;
		}

		if(in_array("menu", $data_option)){
			$data->menu = $request->menu;
		}

		if(in_array("location", $data_option)){
			$data->location = $request->location;
		}
		
		if(in_array("year", $data_option)){
			$data->year = $request->year;
		}

		if(in_array("month", $data_option)){
			$data->month = $request->month;
		}

		if(in_array("project", $data_option)){
			$data->project_id = $request->project;
		}

		if(in_array("dot_color", $data_option)){
			$data->dot_color = $request->dot_color;
		}

		if(in_array("module", $data_option)){
			$data->module = $request->module_id;
		}

		if(in_array("title", $data_option)){
			$data->title = $request->title;
			$data->title_en = $request->title_en;
		}

		if(in_array("name", $data_option)){
			$data->name = $request->name;
			$data->name_en = $request->name_en;
		}

		
		
		
		if(in_array("type", $data_option))
			$data->type = $request->type;

		if($request->type!='')
			$data->type = $request->type;
		
		if(in_array("video_url", $data_option))
			$data->video_url = $request->video_url;

		if(in_array("pilar", $data_option))
			$data->pilar = $request->pilar;

		if(in_array("url_view", $data_option))
			$data->url_view = $request->url_view;

		if(in_array("url", $data_option))
			$data->url = $request->url;

		if(in_array("question", $data_option))
			$data->question = $request->question;

		if(in_array("answer", $data_option))
			$data->answer = $request->answer;

		if(in_array("content_short", $data_option)){
			$data->content_short = $request->content_short;
			$data->content_short_en = $request->content_short_en;
		}
			
		if($ctrl!='contact'){
			if(in_array("content_full", $data_option)){
				$data->content_full = $request->content_full;
				$data->content_full_en = $request->content_full_en;
			}
				
		}	
		
		if($ctrl=='contact'){
			$data->status = 1;
		}

		if(in_array("home_status", $data_option)){
			if($request->home_status!=1){
				$data->home_status = 0;
			}else {
				$data->home_status = 1;
			}
			
		}


		if(in_array("status", $data_option))
			$data->status = @$request->status;

			if(in_array("publish_status", $data_option))
			$data->publish_status = @$request->publish_status;

		if($ctrl=='contact-member'){
			$data->first_name =  $request->first_name;
			$data->sector = $request->sector;
			$data->other_sector = $request->other_sector;
			$data->position = $request->position;
			$data->org_name = $request->org_name;
			$data->org_address = $request->org_address;
			//$data->contact_person = $request->contact_person;
			$data->email = $request->email;
			$data->phone = $request->phone;
			//$data->purpose = $request->purpose;
			//$data->status = 1;
			if($id=="") {
				$data->member_id = $data->generateID();
				//$data->status = 1;
			}
			
		}
		// save
		$data->save();

		// if($ctrl=='contact-member'){
		// 	if($data->status==1)
		// 	{
		// 		// Send notification mail to member
		// 		$datamail['member_id'] = $data->member_id;
		// 		$datamail['name'] = "$request->name";
		// 		$datamail['org_name'] =  $request->address;
		// 		$datamail['contact_person'] =  $request->contact_person;
		// 		$datamail['email'] =  $request->email;
		// 		$datamail['phone'] =  $request->phone;

		// 		$from = ENV('MAIL_FROM_ADDRESS');
		// 		$from_name = ENV('MAIL_FROM_NAME');
		// 		$to = $request->email;
		// 		$to_name = "$request->name";
		// 		$subject = "Registrasi Member JP2GI #".$data->member_id;

		// 		Mail::send(['html' =>'emails.member-confirmation'], $datamail, function($mail) use ($from,$from_name,$to,$to_name,$subject,$datamail){
		// 			$mail->to($to)
		// 					->replyTo($from, $from_name)
		// 					->subject($subject)
		// 					->from($from,$from_name);
		// 		});
		// 	}
		// }

		// notification 
		$status = "success";
		$message = "Data telah berhasil disimpan";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
		
		// redirect page
		return redirect("admin/post/".$ctrl);

	}


	/*== Save Status ==*/
	public function save_status($module_name, $id, $status, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->get_detail_by_name($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->data_option);
		
		// update
		$data = $model::find($id);
		$data->updated_by = 1;
		$data->updated_at = date("Y-m-d H:i:s");
		
		$data->status = $request->status;
		
		// save
		$data->save();
		
		// notification 
		$status = "success";
		$message = "Data has been saved";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
		
		// redirect page
		return redirect("admin/app/".$ctrl);

	}

	/*== Save Home Status ==*/
	public function save_home_status($module_name, $id, $status, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->getDetailByName($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->table_option);
		
		// update
		$data = $model::find($id);
		$data->updated_by = 1;
		$data->updated_at = date("Y-m-d H:i:s");
		
		
		$data->home_status = !$status;
		
		// save
		$data->save();
		
		// notification 
		$status = "success";
		$message = "Data telah berhasil diupdate";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
		
		// redirect page
		return redirect("admin/post/".$ctrl);

	}


	/*== Save Headline ==*/
	public function save_headline($module_name, $id, $headline, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->get_detail_by_name($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->data_option);
		

		if($request->headline==0)
			$headline = '';
		else
			$headline = $request->headline;


		// ubah headline sebelumnya
		$data = $model::where('headline','=',$headline)->first();
		if($data!='')
		{
			$data->headline = '';
			$data->save();
		}
		

		// update
		$data = $model::find($id);
		$data->updated_by = 1;
		$data->updated_at = date("Y-m-d H:i:s");
		
		
		
		$data->headline = $headline;
		
		// save
		$data->save();

		

		
		// notification 
		$status = "success";
		$message = "Data has been saved";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
		
		// redirect page
		return redirect("admin/app/".$ctrl);

	}


	/*== Delete Photo ==*/
	public function delete_photo($module_name, $lang, $id, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->getDetailByName($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->data_option);
		


		// update
		$data = $model::find($id);
		$data->updated_by = 1;
		$data->updated_at = date("Y-m-d H:i:s");
		
		if($lang=='id')
			$data->image = NULL;
		elseif($lang=='en')
			$data->image_en = NULL;

		// save
		$data->save();

		

		
		// notification 
		$status = "success";
		$message = "Photo has been removed";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );
		
		// redirect page
		return redirect("admin/post/$ctrl/update/$id");

	}


	/*== Delete ==*/
	public function delete($module_name, $id, Request $request, Module $module) 
	{
		// get module properties from table
		$module = $module->getDetailByName($module_name);
		// set module properties
		$ctrl = $module->name;
		$title = $module->title;
		$model = "App\\".$module->model;
		$data_option = explode(",",$module->table_option);

		// delete
		$data = $model::find($id)->delete();

		// notification 
		$status = "success";
		$message = "Data telah berhasil dihapus";
		$request->session()->flash( 'status', $status );
		$request->session()->flash( 'message', $message );

		// redirect page
		return redirect("admin/post/".$ctrl);

	}



}