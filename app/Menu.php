<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Menu extends Model
{
  protected $table = "menu";
  protected $primaryKey = 'id';
  public $timestamps = true;


  /**
   * Get list data
   */
  public function getList($parent='', $frontend_status='', $limit='')
  {
    $query = DB::table("$this->table as a");

    if(app()->getLocale()=='id'){
      $query = $query->select('a.*','b.name as mod_name');
    }else{
      $query = $query->select('a.*','a.name_en as name','b.name as mod_name');
    }

                // ->select('a.*','b.name as mod_name')
    $query = $query->leftjoin('modules as b', 'b.menu','a.id')
                   ->orderBy("a.sort_no","ASC");
    
    if($frontend_status!='')
      $query = $query->where("a.frontend_status",'=',$frontend_status);
    
    if($parent!='')
      $query = $query->where("a.parent",'=',$parent);   

    if($limit!='')
      $query = $query->limit($limit);
    
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
      $query = $query->select('a.*','a.name_en as name');
    }

    $query = $query->where($this->primaryKey,$id);  

    $row = $query->first();

    if($query->count()!=NULL)
        return $row;
    else
        return NULL;
  }

}
