@extends( 'backend.layout' )

@section( 'content' )

<script>
$(function () {

  $('.home_status').on('click',this,function(){        
    var id = $(this).attr('row_id');
    var v = $(this).attr('current_status');
    if(v=='')
      v=0;
    window.location.replace("{{ URL('admin/post/'.$ctrl.'/save/home_status') }}/"+id+"/"+v); 
  });

  $(document).on('click', ".delete_bt", function () {
      delete_url = $(this).attr('delete_url');
      var r = confirm("Hapus data ini?");
      if (r == true) {
          window.location = delete_url;
      }
    });
});
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row card-header">
                  <div class="col-md-6">
                    <h3 class="pt-2">{{ $page_title }}</h3>
                  </div>
                  @if($menu!='about' and $menu!='contact-us' and $ctrl!='fact-data')
                <div class="col-md-6 text-right"><a type="button" href="{{URL("admin/post/$ctrl/create")}}" class="btn btn-primary btn-wide">Tambah Data</a></div>
                  @endif
                </div>
                <div class="card-body">

                    @if(@Session::get('status')=='success')
                    <div class="alert bg-success text-white alert-styled-left alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        {!! @Session::get('message') !!}
                    </div>
                    @endif
                    
                    @if(@Session::get('status')=='error')
                    <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        {!! @Session::get('message') !!}
                    </div>
                    @endif
                    
                    <table id="" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center" >No</th>
                                @if(in_array("image", $table_option))
                                <th width="10%" style="text-align: center">Foto</th>
                                @endif
                                @if(in_array("member_id", $table_option))
                                <th width="10%">Member ID </th>
                                @endif
                                @if(in_array("name", $table_option))
                                <th width="15%">Nama @if($ctrl=='project-profile') Proyek @endif </th>
                                @endif

                                @if(in_array("first_name", $table_option))
                                <th width="16%">Nama</th>
                                @endif
                                @if(in_array("org_name", $table_option))
                                <th width="16%">Nama Organisasi</th>
                                @endif
                                @if(in_array("sector", $table_option))
                                <th width="16%">Contact Person</th>
                                @endif
                                @if(in_array("email", $table_option))
                                <th width="16%">Email</th>
                                @endif
                                @if(in_array("phone", $table_option))
                                <th width="17">Phone</th>
                                @endif
                                @if(in_array("year", $table_option))
                                <th width="10%" class="text-center">Tahun</th>
                                @endif
                                
                                @if(in_array("title", $table_option))
                                <th width="40%">Judul @if($ctrl=='event') Event @endif</th>
                                @endif
                                
                                @if(in_array("content_short", $table_option))
                                <th width="40%">Konten</th>
                                @endif
                                @if(in_array("category", $table_option))
                                <th width="20%">Kategori</th>
                                @endif
                                @if(in_array("module", $table_option))
                                <th width="20%">Menu</th>
                                @endif

                                @if(in_array("menu", $table_option))
                                <th width="20%">Menu</th>
                                @endif

                                @if(in_array("project", $table_option))
                                <th width="10%">Proyek</th>
                                @endif

                                @if(in_array("subject", $table_option))
                                <th width="30%">Subjek</th>
                                @endif
                                @if(in_array("question", $table_option))
                                <th width="40%">Pertanyaan</th>
                                @endif
                                @if(in_array("pilar", $table_option))
                                <th width="10%" style="text-align: center">Pilar</th>
                                @endif
                                @if(in_array("status", $table_option))
                                <th width="15%" style="text-align: center" >Status</th>
                                @endif
                                

                                @if(in_array("publish_status", $table_option))
                                <th width="15%" style="text-align: center" >Publish Status</th>
                                @endif
                                @if(in_array("event_date", $table_option))
                                <th width="15%" style="text-align: center">Tanggal Event</th>
                                @endif
                                <th width="10%" style="text-align: center">Tanggal Input</th>
                                @if($ctrl=='news')
                                <th width="10%">Penulis</th>
                                @endif
                                
                                @if(in_array("headline", $table_option))
                                <th width="10%">Headline</th>
                                @endif
                                <th width="10%" style="text-align: center"> @if($ctrl!='news-letter') {{"Aksi"}} @endif</th>
                              </tr>
                        </thead>
                        <tbody>
                            @if($list!=NULL)
                        @foreach($list as $row)
                        {{-- @php $no = ($page-1)*30; @endphp --}}
                          <tr>
                            @if($ctrl=='news')
                            <td  class="text-center" style="vertical-align: middle" >{{$loop->iteration+$no}}</td>
                            @else
                            <td  class="text-center" style="vertical-align: middle">{{$loop->iteration}}</td>
                            @endif
                            @if(in_array("image", $table_option))
                            <td class="text-center" style="vertical-align: top">
                              @if($row->image=='')
                            
                            @else
                              @if(@$row->from_wp==0)
                              <img src="{{ URL('public/images/'.$ctrl.'/'.$row->image) }}" alt="" class="img-fluid">
                              @else
                              @php $year_post = substr($row->created_at,0,4); $month_post = substr($row->created_at,5,2); @endphp
                              <img src="{{ URL('public/images/wp/'.$year_post.'/'.$month_post.'/'.$row->image) }}" alt="" class="img-fluid">
                              @endif
                            @endif  
                            </td>
                            @endif

                            @if(in_array("member_id", $table_option))
                            <td style="vertical-align: middle">{{$row->member_id}}</td>
                            @endif

                            @if(in_array("name", $table_option))
                            <td style="vertical-align: middle">{{$row->name}}</td>
                            @endif

                            

                            @if(in_array("first_name", $table_option))
                            <td style="vertical-align: middle">{{$row->first_name." ".$row->last_name}}</td>
                            @endif

                            @if(in_array("org_name", $table_option))
                            <td style="vertical-align: middle">{{$row->org_name }}</td>
                            @endif

                            @if(in_array("sector", $table_option))
                            <td style="vertical-align: middle">{{$row->sector }}</td>
                            @endif

                            @if(in_array("email", $table_option))
                            <td style="vertical-align: middle">{{$row->email }}</td>
                            @endif

                            @if(in_array("phone", $table_option))
                            <td style="vertical-align: middle">{{$row->phone }}</td>
                            @endif

                            
                            @if(in_array("year", $table_option))
                            <td class="text-center" style="vertical-align: middle">{{$row->year}}</td>
                            @endif
                            @if(in_array("title", $table_option))
                            <td style="vertical-align: middle">
                              {!! "<b>".ucfirst(str_replace("_","-",$row->title))."</b>" !!}
                              @if(@$row->content_short!=NULL or @$row->content_short!='')
                              <p>{!! $row->content_short !!}</p>
                              @endif
                            </td>
                            @endif
                            @if(in_array("content_short", $table_option))
                            <td>
                              {!! $row->content_short !!}
                            </td>
                            @endif
                            @if(in_array("project", $table_option))
                            <td style="vertical-align: middle">{{getProjectName($row->project_id)}}</td>
                            @endif

                            @if(in_array("category", $table_option))
                            <td style="vertical-align: middle">{{getCategoryName($row->category)}}</td>
                            @endif
                            @if(in_array("module", $table_option))
                            <td style="vertical-align: middle">{{getModuleName($row->module)}}</td>
                            @endif
                            @if(in_array("menu", $table_option))
                            <td style="vertical-align: middle">{{getMenuName($row->menu)}}</td>
                            @endif
                            @if(in_array("subject", $table_option))
                            <td style="vertical-align: middle">{{$row->subject}}</td>
                            @endif

                            @if(in_array("question", $table_option))
                            <td style="vertical-align: middle">{{$row->question}}</td>
                            @endif

                            @if(in_array("pilar", $table_option))
                            <td style="vertical-align: middle;text-align: center">{{$row->pilar }}</td>
                            @endif

                            @if(in_array("event_date", $table_option))
                            <td style="vertical-align: middle;text-align: center">{{$row->start_date." ‒ ".$row->end_date }}</td>
                            @endif

                            @if(in_array("status", $table_option))
                            <td style="vertical-align: middle" class="text-center">{!! getMemberStatus($row->status) !!}</td>
                            @endif

                            
                            @if(in_array("publish_status", $table_option))
                            <td style="vertical-align: middle" class="text-center">{!! getPublishStatus($row->publish_status) !!}</td>
                            @endif

                            <td style="vertical-align: middle;text-align: center" style=""><?php echo substr($row->created_at,0,10) ?></td>

                            @if($ctrl=='news')
                            <td style="vertical-align: middle">{{$row->user_name}}</td>
                            @endif
                            
                            

                            

                            @if(in_array("headline", $table_option))
                            <td class="text-center headline_label" row_id="{{ $row->{$pk} }}" style="vertical-align: middle"><span class="label label-warning" style="font-size: 12px;padding:4px 10px">{{$row->headline}}</span></td>
                            <td class="text-center headline_input" row_id="{{ $row->{$pk} }}" style="vertical-align: middle;display: none"><input type="text" name="headline_{{ $row->{$pk} }}" id="headline_{{ $row->{$pk} }}" class="form-control headline text-center"  maxlength="1" value="{{$row->headline}}" /></td>
                            @endif

                            <td>
                              <div class="table-actions text-center">
                                  @if(in_array("home_status", $table_option))
                                  <input class="home_status" current_status='{{ @$row->home_status }}' row_id='{{ @$row->id }}' type="checkbox" name="home_status" value="1" @if(@$row->home_status==1) checked @endif >  Beranda<br><br>
                                  @endif
                                {{-- <i href="#"><i class="ik ik-eye"></i></i> --}}
                                <a href="{{ URL('admin/post/'.$ctrl.'/update/'.$row->{$pk}) }}"><i class="ik ik-edit-2"></i></a>
                                @if($menu!='about' and $menu!='contact-us'  and $ctrl!='fact-data')
                                <a class="delete_bt" delete_url="{{ URL('admin/post/'.$ctrl.'/delete/'.$row->{$pk}) }}" href="javascript:void(0)"><i class="ik ik-trash-2"></i></a>
                                @endif
                              </div>
                            </td>

                          </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
