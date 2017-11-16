@extend('admin_master')
@section('admin_main_content')

      <div class="row">
	  <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">View Category</h2>
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
                   @foreach($all_category as $v_category)
                    <tr>
                    <td>{{$v_category->category_id}}</td>
                    <td>{{$v_category->category_name}}</td>
                    @if($v_category->publication_status == 1)
                    <td>Publish</td>
                    @else
                    <td style="color:red">Unpublish</td>
                    @endif
                    <td>
                        @if($v_category->publication_status == 1)
                        <a  class="btn btn-primary"  href="{{URL::to('/unpublish-category/'.$v_category->category_id)}}">Unpublished</a>
                        @else
                        <a  class="btn btn-primary"  href="{{URL::to('/publish-category/'.$v_category->category_id)}}">Published</a>
                        @endif
                        <a  class="btn btn-primary" href="{{URL::to('/edit-category/'.$v_category->category_id)}}">Edit</a>
                        <a  class="btn btn-primary" href="{{URL::to('/delete-category/'.$v_category->category_id)}}" onclick="return check_delete()">Delete</a>
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