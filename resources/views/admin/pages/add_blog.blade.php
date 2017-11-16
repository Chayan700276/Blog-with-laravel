@extend('admin_master')

@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Add Blog</h3>
            </div>
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">
                @if(Session::has('message'))
                {{session('message')}}
                @endif
                </h3>
            </div>
            {!! Form::open(['url' => '/save-blog','method'=>'post', 'enctype'=>'multipart/form-data']) !!}
                
                <div class="col-md-8 col-md-offset-2">

                    <div class="form-group">
                        <label> Blog Title </label>
                        <input type="text" class="form-control" name="blog_title" placeholder=" Blog Title">
                    </div>
                    
                     <div class="form-group">
                        <label> Blog Category </label>
                        <select class="form-control" name="category_id">
                            <option value=""> Select Category</option>
                         
                         
                             @foreach($all_published_category as $v_category)
					
                                             <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
					
                             @endforeach
                        </select>
                        
                        
                        
                        
                    </div>
                    
                    <div class="form-group">
                        <label> Short Description </label>
                        <textarea id="short_description" name="short_description" class="form-control ck_editor" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Long Description </label>
                        <textarea name="long_description" class="form-control ck_editor" id="long_description" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                     <div class="form-group">
                        <label> Image</label>
                        <input type="file" name='image'>
                    </div>
                    <div class="form-group">
                        <label> Publication Ststus </label>
                        <select class="form-control" name="publication_status">
                            <option value=""> Select Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Submitt" style="float: right">
                </div>
           {!! Form::close() !!}

        </div>
        <!-- /.row -->


    </div>

 @endsection