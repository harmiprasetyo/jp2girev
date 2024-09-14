<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Module extends Model
{
  protected $table = 'modules';
  protected $primaryKey = 'id';
  public $timestamps = true;
    
  
  /**
   * Get list data
   */
  public function getList($status='')
  {
    $query = DB::table("$this->table as a");
    
    if(app()->getLocale()=='id'){
      $query = $query->select('a.*');
    }else{
      $query = $query->select('a.*','a.title_en as title');
    }

    $query = $query->leftjoin('menu as b', 'b.id','a.menu');
    
    if($status!='')
      $query = $query->where("a.status",'=',$status);
    
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
    $query = DB::table("$this->table as a")
                ->select('a.*')
                ->where($this->primaryKey,$id);        
    
    $row = $query->first();

    if($query->count()!=NULL)
      return $row;
    else
      return NULL;
  }


  /**
   * Get detail data by name
   */
  public function getDetailByName($name)
  {
    $query = DB::table("$this->table as a");
    
    if(app()->getLocale()=='id'){
      $query = $query->select('a.*','b.parent as menu_parent');
    }else{
      $query = $query->select('a.*','a.title_en as title','b.parent as menu_parent');
    }

    $query = $query->leftjoin('menu as b', 'b.id','a.menu')
                   ->where('a.name',$name);        

    $row = $query->first();

    if($query->count()!=NULL)
      return $row;
    else
      return NULL;
  }

    
}