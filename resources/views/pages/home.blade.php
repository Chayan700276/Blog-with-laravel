@extend('master')
@section('main_content')
<div class="content-grid">	
    @foreach($all_blog as $v_blog)
    <div class="content-grid-info">
        <img src="{{asset($v_blog->image)}}" width="600px" height="300px" alt=""/>
        <div class="post-info">
            <h4><a href="single.html">{{$v_blog->blog_title}}</a>  July 30, 2014 / 27 Comments</h4>
            <p>{{$v_blog->short_description}}</p>
            <a href="{{URL::to('/blog-details/'.$v_blog->blog_id)}}"><span></span>READ MORE</a>
        </div>
    </div>
    @endforeach
    

</div>
@endsection