@extends( 'template.backend_layout' )

@section( 'content' )
<script type="text/javascript">  

    $('document').ready(function() 
    {
        
        $(".featured-post").on("mouseover",function(){
            rowid = $(this).attr("rowid");
            $(".icon-edit-"+rowid).show();
            $(".icon-delete-"+rowid).show();
        });

        $(".featured-post").on("mouseout",function(){
            rowid = $(this).attr("rowid");
            $(".icon-edit-"+rowid).hide();
            $(".icon-delete-"+rowid).hide();
        })

    });
    
</script>

        <main class="page_main_wrapper">

            
                <div class="container" style="transform: none;">
                        <div class="row row-m" style="transform: none;">
                            <!-- START MAIN CONTENT -->
                            <div class="panel_header" style="background: #fff">
                                <div class="row">
                                    <div class="col-md-6"><h4>{{$page_title}}</h4></div>
                                    @if($ctrl!='about' and $ctrl!='news-letter' )
                                    <div class="col-md-6 text-right"><a type="button" href="{{URL("admin/app/$ctrl/create")}}" class="btn btn-primary btn-sm btn-wide">Tambah Data</a></div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12 col-p  main-content" >
                                <div class="theiaStickySidebar">
                                    <div class="post_details_inner">
                                    
                                        

                                        <div class="post_details_block details_block2">
                                            <div class="row mb-5">

                                                @if($ctrl='gallery')
                                                    @if($cat=='photo')
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#">Galeri Foto</a></li>
                                                        <li><a href="{{URL('admin/app/gallery?cat=video')}}">Galeri Video</a></li>
                                                    </ul>
                                                    @endif
                                                    @if($cat=='video')
                                                    <ul class="nav nav-tabs">
                                                        <li><a href="{{URL('admin/app/gallery?cat=photo')}}">Galeri Foto</a></li>
                                                        <li class="active"><a href="#">Galeri Video</a></li>
                                                    </ul>
                                                    @endif
                                                @endif

                                               
                                            </div>
                                            <!-- post body -->
                                                <div class="" style="padding-top:30px;">
                                                    @php
                                                    $numOfCols = 4;
                                                    $rowCount = 0;
                                                    $bootstrapColWidth = 12 / $numOfCols; 
                                                    @endphp
                                                    @if($list!=NULL)
                                                    @foreach($list as $row)  
                                                        
                                                        @if($rowCount % $numOfCols == 0)
                                                        <div class="row mb-3">
                                                        @endif
                                                        
                                                        <div class="col-md-{{$bootstrapColWidth}} item" style="margin-bottom:25px" >
                                                                <div class="featured-post" rowid="{{ $row->{$pk} }}">
                                                                        @php /*<img src="{{URL('public/libs/imageresizer.php?cropratio=1:.7&width=500px&image='.URL('public/images/'.$ctrl.'/'.$row->image)) }}" alt="" class="img-responsive"> */ @endphp
                                                                        <img src="{{ URL('public/images/'.$ctrl.'/'.$row->image) }}" alt="" class="img-responsive">
                                                                        <a href="{{ URL('admin/app/'.$ctrl.'/update/'.$row->{$pk}) }}"><div class="link-icon-top icon-edit-{{ $row->{$pk} }}" style="display:none" >
                                                                            <i class="fa fa-pencil"></i>
                                                                        </div></a>
                                                                        <a class="delete_bt" delete_url="{{ URL('admin/app/'.$ctrl.'/delete/'.$row->{$pk}) }}" href="javascript:void(0)" ><div class="link-icon-top2 icon-delete-{{ $row->{$pk} }}" style="display:none">
                                                                            <i class="fa fa-trash"></i>
                                                                        </div></a>
                                                                    
                                                                </div>
                                                                <div class="post-info">
                                                                        <center><h3 style="margin-top:10px">{{$row->title}}</h3></center>
                                                                </div>
                                                            </div>
                                                                                                                
                                                        @php $rowCount++; @endphp
                                                        @if($rowCount % $numOfCols == 0 or count($list)==$rowCount ) 
                                                        </div>
                                                        @endif  
            
                                                    @endforeach
                                                    @endif
                                                </div> <!-- /. post body -->


                                            


                                               

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END OF /. MAIN CONTENT -->
                            
                            
                            
                        </div>
                    </div>
           
           
            
        </main>
        
    

@endsection
