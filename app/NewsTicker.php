<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class NewsTicker extends Model
{
    protected $table = 'news_ticker';
    protected $primaryKey = 'id';
    public $timestamps = true;
     
    
    /* Get List */
    public function getList($status='', $limit='')
    {
        $query = DB::table("$this->table as a");
    
        if(app()->getLocale()=='id'){
            $query = $query->select('a.*');
        }else{
            $query = $query->select('a.*','a.title_en as title');
        }
        
        if($status!='')
            $query = $query->where("a.publish_status",'=',$status);

        if($limit!='')
            $query = $query->limit($limit);
        
        $query = $query->orderBy('created_at','DESC');

        $rs = $query->get();

        if($query->count()!=NULL)
            return $rs;
        else
            return NULL;
    }


    /* Get Detail Data */
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

    
}