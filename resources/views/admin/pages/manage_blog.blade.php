@extend('admin_master')
@section('admin_main_content')

      <div class="row">
	  <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Blog List</h2>
            </div>
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-border">
                <tr>
                  <th style="width: 10px">SL.</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th style="">Action</th>
                </tr>
                   @foreach($all_blog as $v_blog)
                    <tr>
                    <td>{{$v_blog->blog_id}}</td>
                    <td>{{$v_blog->blog_title}}</td>
                    @if($v_blog->publication_status == 1)
                    <td>Publish</td>
                    @else
                    <td style="color:red">Unpublish</td>
                    @endif
                    <td>
                        @if($v_blog->publication_status == 1)
                        <a  class="btn btn-primary"  href="{{URL::to('/unpublish-blog/'.$v_blog->blog_id)}}">Unpublished</a>
                        @else
                        <a  class="btn btn-primary"  href="{{URL::to('/publish-blog/'.$v_blog->blog_id)}}">Published</a>
                        @endif
                        <a  class="btn btn-primary" href="{{URL::to('/edit-blog/'.$v_blog->blog_id)}}">Edit</a>
                        <a onclick="return check_delete()" class="btn btn-primary" href="{{URL::to('/delete-blog/'.$v_blog->blog_id)}}">Delete</a>
                    </td>
                    
                    </tr>
                   @endforeach
               
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
@endsection