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
                  <th>Serial</th>
                  <th>Comments</th>
                  <th style="">Action</th>
                </tr>
                   @foreach($all_comments as $comment_data)
                   <?php $i =1; ?>
                    <tr>
                    <td><?php echo $i ?></td>
                    <td>{{$comment_data->comments}}</td>
                    @if($comment_data->publication_status == 1)
                    <?php $i++ ?>
                    <td>Publish</td>
                    @else
                    <td style="color:red">Unpublish</td>
                    @endif
                    <td>
                        @if($comment_data->publication_status == 1)
                        <a  class="btn btn-primary"  href="{{URL::to('/unpublish-comment/'.$comment_data->comments_id)}}">Unpublished</a>
                        @else
                        <a  class="btn btn-primary"  href="{{URL::to('/publish-comment/'.$comment_data->comments_id)}}">Published</a>
                        @endif
                        <a onclick="return check_delete()" class="btn btn-primary" href="{{URL::to('/delete-comment/'.$comment_data->comments_id)}}">Delete</a>
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
