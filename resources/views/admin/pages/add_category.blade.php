@extend('admin_master')
@section('admin_main_content')
    <!-- Content Header (Page header) -->
    <div class="box-body">

        <div class="row">
            <div>
                <h2 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">Add Category</h2>
            </div>
            <div>
                <h3 class="bg-success text-primary text-center" style="font-family: monospace; font-weight: bold;">
                @if(Session::has('message'))
                {{session('message')}}
                @endif
                </h3>
            </div>
            {!! Form::open(['url' => '/save-category','method'=>'post','class'=>'abcd']) !!}
                
                <div class="col-md-8 col-md-offset-2">
<!--                    <div class="form-group">
                        <label>Select Catagory : </label>
                        <select name="category" class="form-control select2" style="width: 100%;">
                            <option></option>
                            <option value="1">Main Slider</option>
                            <option value="2">Footer Slider</option>
                        </select>
                    </div>-->
                    <div class="form-group">
                        <label> Add category </label>
                        <input type="text" class="form-control" name="category_name" placeholder=" Add Category....">
                    </div>
                    <div class="form-group">
                        <label> Category Description </label>
                        <textarea name="category_description" class="form-control" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Publication Ststus </label>
                        <select class="form-control" name="publication_status">
                            <option>Select Status</option>
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