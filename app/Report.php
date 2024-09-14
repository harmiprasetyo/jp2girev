<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Report extends Model
{
  protected $table = "report";
  protected $primaryKey = 'id';
  public $timestamps = true;

  
  /**
   * Get list data
   */
  public function getList($status='', $limit='',$year='',$month='')
  {
    $query = DB::table("$this->table as a");
    
    if(app()->getLocale()=='id'){
      $query = $query->select('a.*');
    }else{
      $query = $query->select('a.*','a.title_en as title','a.content_short_en as content_short','a.content_full_en as content_full');
    }
    
    if($status!='')
      $query = $query->where("a.status",'=',$status);

    if($year!='')
      $query = $query->where("a.year",'=',$year);

    if($month!='')
      $query = $query->where("a.month",'=',$month);
    
    if($limit!='')
      $query = $query->limit($limit);
    
    $query = $query->orderBy('year','DESC')->orderBy('month','DESC')->orderBy('created_at','DESC');

    $rs = $query->get();

    if($query->count()!=NULL)
      return $rs;
    else
      return NULL;

  }


  /**
   * Get Tahun List
   */
  public function getYearList($status='', $limit='')
  {
    $query = DB::table("$this->table as a");
    
    $query = $query->select('a.year');
    
    if($status!='')
      $query = $query->where("a.status",'=',$status);

    if($limit!='')
      $query = $query->limit($limit);
    
    $query = $query->orderBy('year','DESC');

    $rs = $query->distinct()->get();

    if($query->count()!=NULL)
      return $rs;
    else
      return NULL;

  }



  /**
   * Get Tahun List
   */
  public function getMonthList($year='', $status='', $limit='')
  {
    $query = DB::table("$this->table as a");
    
    $query = $query->select('a.month');
    
    if($year!='')
      $query = $query->where("a.year",'=',$year);

    if($status!='')
      $query = $query->where("a.status",'=',$status);

    if($limit!='')
      $query = $query->limit($limit);
    
      $query = $query->orderBy('year','DESC')->orderBy('month','DESC')->orderBy('created_at','DESC');

    $rs = $query->distinct()->get();

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
