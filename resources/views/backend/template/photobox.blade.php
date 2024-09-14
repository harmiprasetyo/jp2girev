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
       
        <div class="row">
        <div class="container" style="transform: none;">
                <div class="row row-m" style="transform: none;">
                    <div class="col-sm-12 main-content col-p">
                        <div class="theiaStickySidebar">
                            <div class="contact_form_inner">
                                <div class="panel_inner">
                                    <div class="panel_header">
                                        <div class="row">
                                            <div class="col-md-6"><h4>{{$page_title}}</h4></div>
                                            <div class="col-md-6 text-right"><a type="button" href="{{URL("admin/app/$ctrl/create")}}" class="btn btn-primary btn-sm btn-wide">Tambah Data</a></div>
                                        </div>
                                    </div>
                                    <div class="panel_body">
                                        

                                    <!-- Content area -->
                                    <div class="content">

                                        

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
                                            
                                            <div class="col-md-3 item" style="margin-bottom:25px" >
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


                                    </div>
                                    <!-- /content area -->

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

        </div>
            
    </main>
        
    

@endsection
