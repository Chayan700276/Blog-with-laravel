@extend('master')
@section('main_content')
<div class="content-grid">	
   @foreach($category_data as $cat_data) 
    <div class="content-grid-info">
        <img src="{{asset($cat_data->image)}}" width="600px" height="300px" alt=""/>
        <div class="post-info">
            <h4><a href="single.html">{{$cat_data->blog_title}}</a>  Category name : </h4>
            <p>{{$cat_data->short_description}}</p>
       <a href="{{URL::to('/blog-details/'.$cat_data->blog_id)}}"><span></span>READ MORE</a>
        </div>
    </div>
  @endforeach  

</div>
@endsection