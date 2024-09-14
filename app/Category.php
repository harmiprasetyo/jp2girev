<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;
     
    
    /* Get List */
    public function get_list($status='', $limit='')
    {
        $query = DB::table("$this->table as a")
            ->select('a.*')
            ->orderBy("a.created_at","DESC");
        
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


    /* Get Detail Data */
    public function get_detail($id)
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