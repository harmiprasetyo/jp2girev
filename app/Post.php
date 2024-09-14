<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Post extends Model
{    
    /* Get List */
    public function getList($table, $primaryKey, $status='',$limit='',$offset=0,$headline='',$cat='',$keyword='')
    {
        $query = DB::table("$table as a")
            ->select('a.*','b.name as user_name')
            ->join('user as b','a.created_by', '=', 'b.user_id')
            ->orderBy("a.created_at","DESC");
        
        if($status!='')
            $query = $query->where("a.status",'=',$status);

        if($headline!='')
            $query = $query->where("a.headline",'<>','');

        
        if($keyword!='')
        {
            $query = $query->where("title",'like',"%$keyword%");
        }

        if($cat!='')
        {
            if($cat=='photo')
                $cat=1;
            if($cat=='video')
                $cat=2;              
            $query = $query->where("type",'=',$cat);
        }

        if($limit!='')
            $query = $query->offset($offset)->limit($limit);
        
        $query = $query->orderBy('created_at','DESC');

        $rs = $query->get();

        if(count($rs)!=NULL)
            return $rs;
        else
            return NULL;
    }


    /* Get Detail Data */
    public function getDetail($table, $primaryKey, $id)
    {
        $query = DB::table("$table as a")
            ->select('a.*','b.name as user_name')
            ->join('user as b','a.created_by', '=', 'b.user_id')
            ->where($primaryKey,$id);        
        $row = $query->first();

        if(count($row)!=NULL)
            return $row;
        else
            return NULL;
    }

    
}