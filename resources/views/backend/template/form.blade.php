@extends( 'backend.layout' )

@section( 'content' )
<script>
(function($) {
  'use strict';
  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });

  
})(jQuery);


</script>

<script>
  $(document).ready(function () {
      $("input[name='sector']").on('click',function(){
          v= $(this).val();
          if(v==6)
              $("#other_sector_div").show();
          else
              $("#other_sector_div").hide();
      });
  });
  </script>

<script>
    $(function () {
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
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <form action="{{URL("admin/post/$ctrl/save")}}" method="POST" class="form-horizontal form-validate-jquery" id="transaction_form" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ @$detail->{$pk} }}" />
        <div class="card-header"><h3>{{ $page_title }}</h3></div>
        <div class="card-body">

          @if(in_array("module", $data_option))
          <div class="form-group">
            <label class="">Menu <span class="text-danger">*</span></label>
            <div class="col-md-9">
              <select class="form-control" name="module_id" id="module_id" required>
                <option value=""  >Pilih menu...</option>
                @foreach($module_list as $m)
                <option value="{{$m->module_id}}" @if(@$detail->module==$m->module_id) {{"selected"}} @endif >{{ $m->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @endif

          @if(in_array("name", $data_option))
          <div class="form-group">
            <label class="">Nama <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="name" value="{{@$detail->name}}" required>
          </div>
          <div class="form-group">
            <label class="">Nama En <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="name_en" value="{{@$detail->name_en}}" required>
          </div>  
          @endif

          @if(in_array("first_name", $data_option))
          <div class="form-group">
            <label class="">Nama<span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="first_name" value="{{@$detail->first_name." ".@$detail->last_name }}" required>
          </div>
          @endif

          @if(in_array("position", $data_option))
          <div class="form-group">
            <label class="">Posisi<span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="position" value="{{@$detail->position}}" required>
          </div>
          @endif

          {{-- @if(in_array("address", $data_option))                   
          <div class="form-group">
              <label class="">Alamat <span class="text-danger">*</span></label>
              <textarea class="form-control" rows="2"  maxlength="200" type="text" name="address" required>{{@$detail->address}}</textarea>
          </div>
          @endif --}}

          @if(in_array("org_name", $data_option))
          <div class="form-group">
            <label class="">Nama Institusi <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="org_name" value="{{@$detail->org_name}}" required>
          </div>
          @endif

          @if(in_array("sector", $data_option))
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label >{{ __('label.sector') }} <span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-md-1 text-right pr-0">a&nbsp;&nbsp;<input type="radio" name="sector" value="1" @if(@$detail->sector==1) checked @endif ></div>
                        <div class="col-md-11">Pemerintah</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-right pr-0">b&nbsp;&nbsp;<input type="radio" name="sector" value="2" @if(@$detail->sector==2) checked @endif></div>
                        <div class="col-md-11">Swasta</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-right pr-0">c&nbsp;&nbsp;<input type="radio" name="sector" value="3" @if(@$detail->sector==3) checked @endif></div>
                        <div class="col-md-11">Asosiasi</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-right pr-0">d&nbsp;&nbsp;<input type="radio" name="sector" value="4" @if(@$detail->sector==4) checked @endif></div>
                        <div class="col-md-11">Akademisi</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 text-right pr-0">e&nbsp;&nbsp;<input type="radio" name="sector" value="5" @if(@$detail->sector==5) checked @endif></div>
                        <div class="col-md-11">Individual/Expert</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-1 text-right pr-0">f&nbsp;&nbsp;<input type="radio" id="other_sector_rd" name="sector" value="6" @if(@$detail->sector==6) checked @endif></div>
                        <div class="col-md-11">Lainnya</div>
                    </div>
                   
                    <div class="row" id="other_sector_div"  @if(@$detail->sector!=6) style="display: none" @endif>
                        <div class="col-md-1 text-right pr-0"></div>
                        <div class="col-md-11"><input type="text" name="other_sector" class="form-control" placeholder="Isi Industri/sektor institusi Anda" value="{{ @$detail->other_sector }}" ></div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endif

          @if(in_array("org_address", $data_option))                   
          <div class="form-group">
              <label class="">Alamat Institusi <span class="text-danger">*</span></label>
              <textarea class="form-control" rows="2"  maxlength="200" type="text" name="org_address" required>{{@$detail->org_address}}</textarea>
          </div>
          @endif

          {{-- @if(in_array("contact_person", $data_option))
          <div class="form-group">
            <label class="">Contact Person <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="contact_person" value="{{@$detail->contact_person}}" required>
          </div>
          @endif --}}


          @if(in_array("contact_person", $data_option))
          <div class="form-group">
            <label class="">Phone <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="phone" value="{{@$detail->phone}}" required>
          </div>
          @endif


          @if(in_array("contact_person", $data_option))
          <div class="form-group">
            <label class="">Email <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="email" value="{{@$detail->email}}" required>
          </div>
          @endif


          {{-- @if(in_array("purpose", $data_option))                   
          <div class="form-group">
              <label class="">Tujuan / Motivasi menjadi Anggota  <span class="text-danger">*</span></label>
              <textarea class="form-control" rows="2"  maxlength="200" type="text" name="purpose" required>{{@$detail->purpose}}</textarea>
          </div>
          @endif --}}

          @if(in_array("project", $data_option))
          <div class="form-group">
            <label class="">Nama Proyek <span class="text-danger">*</span></label>
              <select class="form-control w-50" name="project" id="project" required>
                <option value=""  >Pilih Proyek...</option>
                @foreach($project_list as $p)
                <option value="{{$p->id}}" @if(@$detail->project_id==$p->id) {{"selected"}} @endif >{{ $p->location_name }}</option>
                @endforeach
              </select>
          </div>
          @endif

          @if(in_array("menu", $data_option))
          <div class="form-group">
            <label class="">Menu <span class="text-danger">*</span></label>
              <select class="form-control w-50" name="menu" id="menu" required>
                <option value=""  >Pilih Menu...</option>
                @foreach($menu_list as $m)
                <option value="{{$m->id}}" @if(@$detail->menu==$m->id) {{"selected"}} @endif >{{ $m->name }}</option>
                @endforeach
              </select>
          </div>
          @endif

          

          @if(in_array("year", $data_option))
          <div class="form-group">
            <label class="">Tahun <span class="text-danger">*</span></label>
              <input class="form-control w-25" type="text" name="year" value="{{@$detail->year}}" required>
              {{-- <select name="year" id="year"  class="select form-control w-25" required >
                  @php 
                  $start_year = '2019'; 
                  $current_year = date('Y');
                  @endphp
                  @for($y=$start_year;$y<=$current_year;$y++)
                    @if($y==@$year)
                      @php $selected='selected' @endphp
                    @else
                      @php $selected='' @endphp
                    @endif
                    {!! '<option value="'.$y.'" '.$selected.'>'.$y.'</option>' !!}  
                  @endfor
                </select>  --}}
          </div>
          @endif

          @if(in_array("month", $data_option))
          <div class="form-group">
            <label class="">Bulan <span class="text-danger">*</span></label>
              <select name="month" id="month" class="select form-control w-25" required>
                  <option value=""  >Pilih Bulan...</option>
                @for($m=1; $m<=12; ++$m)
                  @if(sprintf('%02d',$m)==@$detail->month)
                    @php $selected='selected' @endphp
                  @else
                    @php $selected='' @endphp
                  @endif
                  {!! '<option value="'.sprintf('%02d',$m).'" '.$selected.'>'.date('F', mktime(0, 0, 0, $m, 1)).'</option>' !!}
                @endfor
              </select> 
          </div>
          @endif

         

          
          @if(in_array("type", $data_option))
          <div class="form-group">
            <label class="">Jenis Galeri <span class="text-danger">*</span></label>
            <div class="col-md-3">
              <select class="form-control" name="type" id="gallery_type" required>
                <option value=""  >Pilih jenis galeri...</option>
                <option value="1" @if(@$detail->type=='1') {{"selected"}} @endif >Foto</option>
                <option value="2" @if(@$detail->type=='2') {{"selected"}} @endif >Video</option>
              </select>
            </div>
          </div>
          @endif

          @if(in_array("category", $data_option))
          <div class="form-group">
            <label class="">Kategori <span class="text-danger">*</span></label>
            <div class="col-md-9">
              <select class="form-control" name="category" id="category" required>
                <option value=""  >Pilih kategori...</option>
                @foreach($category_list as $c)
                <option value="{{$c->id}}" @if(@$detail->category==$c->id) {{"selected"}} @endif >{{ $c->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @endif

          @if(in_array("article", $data_option))
            <div class="form-group">
              <label class="">Artikel (opsional)</label>
                <select class="form-control" name="article" id="article">
                  <option value=""  >Pilih Artikel...</option>
                  @foreach($article_list as $a)
                  <option value="{{$a->id}}" @if(@$detail->article==$a->id) {{"selected"}} @endif >{{ $a->title }}</option>
                  @endforeach
                </select>
            </div>
          @endif

          @if(in_array("title", $data_option))
          <div class="form-group">
            <label class="">@if($ctrl=='gallery') {{"Caption"}} @else {{"Judul"}} @endif <span class="text-danger">*</span></label>
            @if($ctrl=='gallery')
            <textarea class="form-control" rows="3"  maxlength="250" type="text" name="title" required>{{@$detail->title}}</textarea>
            @else
            <input class="form-control" type="text" name="title" value="{{@$detail->title}}" required>
            @endif
          </div>  
          <div class="form-group">
            <label class="">@if($ctrl=='gallery') {{"Caption En"}} @else {{"Judul En"}} @endif <span class="text-danger">*</span></label>
            @if($ctrl=='gallery')
            <textarea class="form-control" rows="3"  maxlength="250" type="text" name="title_en" required>{{@$detail->title_en}}</textarea>
            @else
            <input class="form-control" type="text" name="title_en" value="{{@$detail->title_en}}" required>
            @endif
          </div>  
          @endif

          
          @if(in_array("date", $data_option))
          <div class="form-group">
            <label class="" style="display: block">Tanggal <span class="text-danger">*</span></label>
              <input class="form-control w-25" style="display: inline" type="date" name="date" value="{{@$detail->date}}" required placeholder="Tanggal">
             
          </div>
          @endif


          @if(in_array("event_date", $data_option))
          <div class="form-group">
            <label class="" style="display: block">Tanggal Event <span class="text-danger">*</span></label>
              <input class="form-control w-25" style="display: inline" type="date" name="date_start" value="{{@$detail->start_date}}" required placeholder="Tanggal Mulai"> - 
              <input class="form-control w-25" style="display: inline" type="date" name="date_end" value="{{@$detail->end_date}}" required  placeholder="Tanggal Selesai">
          </div>
          @endif

          @if(in_array("location", $data_option))
          <div class="form-group">
            <label class="">Lokasi <span class="text-danger">*</span></label>
              <input class="form-control" type="text" name="location" value="{{@$detail->location}}" required>
          </div>
          @endif

          @if(in_array("url_view", $data_option))
          <div class="form-group" id="url_view_div">
            <label class="">URL View <span class="text-danger">*</span></label>
            <div class="col-md-9">
              <input class="form-control" type="text" name="url_view" id="url_view" value="{{@$detail->url_view}}" required>
            </div>
          </div>
          @endif

          @if(in_array("url", $data_option))
          <div class="form-group" id="url_div">
            <label class="">URL</label>
              <input class="form-control" type="text" name="url" id="url" value="{{@$detail->url}}">
          </div>
          @endif
                  
                  
          @if(in_array("content_short", $data_option))                   
          <div class="form-group">
              <label class="">Konten Singkat <span class="text-danger">*</span></label>
              <textarea class="form-control" rows="3"  maxlength="200" type="text" name="content_short" required>{{@$detail->content_short}}</textarea>
          </div>
          <div class="form-group">
            <label class="">Konten Singkat En <span class="text-danger">*</span></label>
            <textarea class="form-control" rows="3"  maxlength="200" type="text" name="content_short_en" required>{{@$detail->content_short_en}}</textarea>
          </div>
          @endif

          @if(in_array("content_full", $data_option)) 
            @if($ctrl=='contact') 
              @php $detail_label = "Pesan"; $rows=10; $disabled="disabled"; $required=""; $id="" @endphp
            @else 
              @php $detail_label = "Konten Detail"; $rows=10; $disabled=""; $id="editor1"; $required='<span class="text-danger">*</span>' @endphp
              @php $detail_label_en = "Konten Detail En"; $rows=10; $disabled=""; $id="editor1"; $required='<span class="text-danger">*</span>' @endphp
            @endif
          
          <div class="form-group">
            <label class="">{{$detail_label}} {!!$required!!}</label>
            <textarea id="{{$id}}"  class="form-control content_full" rows="{{$rows}}" type="text" name="content_full" >{{@$detail->content_full}}</textarea>
          </div>

          <div class="form-group">
            <label class="">{{$detail_label_en}} {!!$required!!}</label>
            <textarea id="{{$id}}"  class="form-control content_full" rows="{{$rows}}" type="text" name="content_full_en" >{{@$detail->content_full_en}}</textarea>
          </div>
          @endif


          @if(in_array("question", $data_option))                   
          <div class="form-group">
            <label class="">Pertanyaan <span class="text-danger">*</span></label>
            <div class="col-md-9">
              <textarea class="form-control" rows="3" type="text" name="question" required>{{@$detail->question}}</textarea>
            </div>
          </div>
          @endif

          @if(in_array("answer", $data_option)) 
          <div class="form-group">
            <label class="">Jawaban <span class="text-danger">*</span></label>
            <div class="col-md-9">
              <textarea id="editor2"  class="form-control" rows="15" type="text" name="answer" required>{{@$detail->answer}}</textarea>
            </div>
          </div>
          @endif


          @if(in_array("image", $data_option) and isset($detail) ) 
          <div class="form-group" id="image_prev_div">
            <label class="">Foto @if(!isset($detail)) {!! '' !!} @endif </label>
              <div class="col-md-5 pl-0">
                  @if($detail->image=='')
                  <img src="{{ URL('public/images/no-image.png') }}" alt="" class="img-fluid" >   
                @else
              <img class="w-50 mr-3" src="{{URL('public/images/'.$ctrl.'/'.$detail->image)}}" /> <a delete_url="{{ URL("admin/post/$ctrl/delete-photo/id/".@$detail->id) }}" href="javascript:void(0)" class="delete_bt text-danger"><i class="ik ik-trash"></i>&nbsp;Hapus Foto</a>
                @endif
              </div>
          </div>
          <div class="form-group" id="image_prev_div">
            <label class="">Foto En @if(!isset($detail)) {!! '' !!} @endif </label>
              <div class="col-md-5 pl-0">
                  @if($detail->image_en=='')
                  <img src="{{ URL('public/images/no-image.png') }}" alt="" class="img-fluid" >   
                @else
                <img class="w-50 mr-3" src="{{URL('public/images/'.$ctrl.'/'.$detail->image_en)}}" /> <a delete_url="{{ URL("admin/post/$ctrl/delete-photo/en/".@$detail->id) }}" href="javascript:void(0)" class="delete_bt text-danger"><i class="ik ik-trash"></i>&nbsp;Hapus Foto</a>
                @endif
              </div>
          </div>
          @endif

          @if(in_array("image", $data_option)) 
          <div class="form-group" id="image_div">
            <label class="">@if(isset($detail)) {{"Update "}} @endif Foto @if(!isset($detail)) {!! '' !!} @endif </label>
              {{-- <input class="form-control" style="margin-bottom: 10px" type="file" id="image" name="image" value="{{@$detail->image}}" @if(!isset($detail)) {{ "required" }} @endif /> --}}
              <input type="file" name="image" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload Foto</button>
                </span>
              </div>

              @if($ctrl=='banner')
                <small class="text-muted">Photo size : 1280px x 700px (dengan resolusi gambar 150 pixel/inch atau file sizenya dibawah 1 mb)</small>
              @endif
          </div>

          <div class="form-group" id="image_div">
            <label class="">@if(isset($detail)) {{"Update "}} @endif Foto En @if(!isset($detail)) {!! '' !!} @endif </label>
              {{-- <input class="form-control" style="margin-bottom: 10px" type="file" id="image" name="image" value="{{@$detail->image}}" @if(!isset($detail)) {{ "required" }} @endif /> --}}
              <input type="file" name="image_en" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload Foto</button>
                </span>
              </div>
              @if($ctrl=='banner')
                <small class="text-muted">Photo size : 1280px x 700px (dengan resolusi gambar 150 pixel/inch atau file sizenya dibawah 1 mb)</small>
              @endif
          </div>
          
          @endif

          
          @if($ctrl=='gallery')
            @php $label = "File"; $label_en = "File En"; @endphp
          @else
            @php $label = "Dokumen"; $label_en = "Dokumen En" @endphp
          @endif

          @if(in_array("file", $data_option) and isset($detail) ) 
          <div class="form-group" id="div_prev_file">
            <label class="">{{$label}}  @if(!isset($detail)) {!! '<span class="text-danger">*</span>' !!} @endif </label>
            <div class="col-md-9">
              <a target="_blank ml-4" href="{{URL("public/docs/$ctrl/$detail->file")}}" ><i class="ik ik-link"></i> {{$detail->file}}</a>
            </div>
          </div>
          <div class="form-group" id="div_prev_file">
            <label class="">{{$label_en}}  @if(!isset($detail)) {!! '<span class="text-danger">*</span>' !!} @endif </label>
            <div class="col-md-9">
              <a target="_blank" href="{{URL("public/docs/$ctrl/$detail->file_en")}}" ><i class="ik ik-link"></i> {{$detail->file_en}}</a>
            </div>
          </div>
          {{-- <div class="form-group" id="div_prev_file">
            <label class="">{{$label_en}}  @if(!isset($detail)) {!! '<span class="text-danger">*</span>' !!} @endif </label>
            <div class="col-md-9">
              <a href="{{URL("public/docs/$ctrl/$detail->file_en")}}" />{{$detail->file_en}}</a>
            </div>
          </div> --}}
          @endif

          @if(in_array("file", $data_option))
          <div class="form-group" id="div_file">
            <label class="">@if(isset($detail)) {{ "Update" }} @else {{ "Upload" }} @endif {{$label}} @if(!isset($detail)) {!! '<span class="text-danger">*</span>' !!} @endif </label>
            <input type="file" name="file" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload File</button>
                </span>
              </div>
          </div>
          <div class="form-group" id="div_file_en">
            <label class="">@if(isset($detail)) {{ "Update" }} @else {{ "Upload" }} @endif {{$label_en}} @if(!isset($detail)) {!! '<span class="text-danger">*</span>' !!} @endif </label>
            <input type="file" name="file_en" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload File</button>
                </span>
              </div>
          </div>
          @endif

          @if(in_array("video_file", $data_option) and isset($detail) ) 
          <div class="form-group">
            <label class="">File Video  @if(!isset($detail)) {!! '' !!} @endif </label>
            <div class="col-md-9">
              <a target="_blank" href="{{URL("public/videos/$ctrl/$detail->video_file")}}" ><i class="ik ik-film"></i>&nbsp;&nbsp;{{$detail->video_file}}</a>
            </div>
          </div>

          <div class="form-group">
            <label class="">File Video En  @if(!isset($detail)) {!! '' !!} @endif </label>
            <div class="col-md-9">
              <a target="_blank" href="{{URL("public/videos/$ctrl/$detail->video_file_en")}}" ><i class="ik ik-film"></i>&nbsp;&nbsp;{{$detail->video_file_en}}</a>
            </div>
          </div>

          
          @endif

          @if(in_array("video_file", $data_option))
          <div class="form-group">
            <label class="">@if(isset($detail)) {{ "Update" }} @else {{ "Upload" }} @endif File Video @if(!isset($detail)) {!! '' !!} @endif </label>
            <input type="file" name="video_file" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Video">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload Video</button>
                </span>
              </div>
          </div>

          <div class="form-group">
            <label class="">@if(isset($detail)) {{ "Update" }} @else {{ "Upload" }} @endif File Video En @if(!isset($detail)) {!! '' !!} @endif </label>
            <input type="file" name="video_file_en" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Video">
                <span class="input-group-append">
                <button class="file-upload-browse btn btn-inverse" type="button">Upload Video</button>
                </span>
              </div>
          </div>
          @endif


          @if(in_array("video_url", $data_option))
          <div class="form-group" id="div_video_url">
            <label class="">Youtube ID</label>
            <div class="col-md-9">
              <input class="form-control" type="text"  style="margin-bottom: 10px" placeholder="https://www.youtube.com/watch?v={Youtube ID}" id="video_url" name="video_url" value="{{@$detail->video_url}}" >
              <small  class="text-muted">Isi hanya Youtube ID saja, tidak dengan alamat youtubenya</small>
            </div>
          </div>  
          @endif


          @if(in_array("home_status", $data_option))
          <div class="form-group row">
            <label class="control-label col-md-3">Tampilkan di Beranda?</label>
            <div class="col-md-9">
              <input class="" type="checkbox" name="home_status" value="1" @if(@$detail->home_status==1) checked @endif > Ya
            </div>
          </div>  
          @endif

          @if(in_array("status", $data_option)) 
          {{-- @if(isset($detail)) --}}
          <div class="form-group">
              <label>Status <span class="text-danger">*</span></label>
              
                  <select class="form-control" name="status" required>
                      <option value=""  >Pilih Status...</option>
                      <option value="0" @if(@$detail->status=='0') {{"selected"}} @endif >Menunggu Approval</option>
                      <option value="1" @if(@$detail->status=='1') {{"selected"}} @endif >Aktif</option>
                      <option value="2" @if(@$detail->status=='2') {{"selected"}} @endif >Tidak Aktif</option>
                  </select>
            
          </div>
          {{-- @endif --}}
          @else
          <input type="hidden" name="status" value='0'>
          @endif

          @if(in_array("publish_status", $data_option)) 
          <div class="form-group">
            <label>Publish Status <span class="text-danger">*</span></label>
            <select class="form-control" name="publish_status" required>
                <option value=""  >Pilih Status...</option>
                <option value="1" @if(@$detail->publish_status=='1') {{"selected"}} @endif >Publish</option>
                <option value="0" @if(@$detail->publish_status=='0') {{"selected"}} @endif >Unpublish</option>
            </select>
            
          </div>
          @endif
          

        </div>
        <div class="card-footer">
            <button type="submit" id="submit_bt" class="btn btn-primary btn-wide mr-2">Simpan</button>
            <a type="button" href="{{URL("admin/post/$ctrl")}}" class="btn btn-light btn-wide">Batal</a>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
    

@endsection
