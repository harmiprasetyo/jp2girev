<?php

  /**
   * Merubah format tanggal
   */
  function dateCustom($string,$format)
  {
      return \Carbon\Carbon::parse($string)->format($format);
  }

  
  /**
   * Menampilkan menu list
   */
  function getMenu($parent,$frontend_status=1)
  {
    $model = new App\Menu;
    $list= $model->getList($parent,$frontend_status);

    return $list;
  }


  /**
   * Menampilkan label status member
   */
  function getMemberStatus($v="")
  {
    switch($v){
        case '0' : $label = '<span class="badge badge-secondary">Menunggu Approval</span>'; break;
        case '1' : $label = '<span class="badge badge-success">Aktif</span>'; break;
        case '2' : $label = '<span class="badge badge-warning">Tidak Aktif</span>'; break;
        default  : $label = "-";
    }
    return $label;
  }

  /**
   * Menampilkan label status publish
   */
  function getPublishStatus($v="")
  {
    switch($v){
        case '1' : $label = '<span class="badge badge-success">Published</span>'; break;
        case '0' : $label = '<span class="badge badge-secondary">Unpublished</span>'; break;
        default  : $label = '<span class="badge badge-secondary">Unpublished</span>';
    }
    return $label;
  }



   /**
   * Menampilkan Nama Kategori
   */
  function getCategoryName($id)
  {
    $cat_detail = App\Category::find($id);
    $name = @$cat_detail->name;
    return $name;
  }
  

  