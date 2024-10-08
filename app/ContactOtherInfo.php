<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class ContactOtherInfo extends Model
{
  protected $table = "contact_other_info";
  protected $primaryKey = 'id';
  public $timestamps = true;

  
  /**
   * Get list data
   */
  public function getList($status='', $limit='')
  {
    $query = DB::table("$this->table as a");
    
    if(app()->getLocale()=='id'){
      $query = $query->select('a.*');
    }else{
      $query = $query->select('a.*','a.title_en as title','a.content_short_en as content_short','a.content_full_en as content_full');
    }
    
    if($status!='')
      $query = $query->where("a.status",'=',$status);

    if($limit!='')
      $query = $query->limit($limit);
    
    $query = $query->orderBy('created_at','DESC');

    $rs = $query->get();

    if($query->count()!=NULL)
      return $rs;
    else
      return NULL;

  }


  /**
   * Get detail data
   */
  public function getDetail($id)
  {
    $query = DB::table("$this->table as a");
    if(app()->getLocale()=='id'){
      $query = $query->select('a.*');
    }else{
      $query = $query->select('a.*','a.title_en as title','a.content_short_en as content_short','a.content_full_en as content_full');
    }
    $query = $query->where($this->primaryKey,$id);        
    $row = $query->first();

    if($query->count()!=NULL)
      return $row;
    else
      return NULL;
  }

}
