<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Member extends Model
{
  protected $table = "members";
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
      $query = $query->select('a.*');
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


  /**
   * Generate unique code for ID
   */
  public function generateID()
  {
    $current_month = date('m');
    $current_year = date('y');
    $prefix = "M$current_month$current_year";
    
    // Get last number
    $query = DB::table("$this->table as a")
            ->select(DB::raw('max(member_id) as max_code'))
            ->where("member_id","like","$prefix%");
    $row = $query->first();

    // Get new number
    if($query->count()==0){
        $no = "1";
    } else{
        $max_code = $row->max_code;
        $no = (int) substr($max_code, 6, 4); // M10190001
        $no++;
    }
    
    $new_no = sprintf("%03s", $no);
    $new_code = $prefix.$new_no;
    
    // Check is new number is exist or not, loop until valid (recursive)
    $query = DB::table("$this->table as a")
                ->where("member_id","=",$new_code);
    $row = $query->first();
    
    if($query->count()==0){
        return $new_code;
    } else{
        $this->generateID();
    }
  }

}
