@extend('master')
@section('main_content')
<div class="content-grid">	
   
    <div class="content-grid-info">
        <img src="{{asset($blog_details_by_id->image)}}" width="600px" height="300px" alt=""/>
        <div class="post-info">
            <h4><a href="single.html">{{$blog_details_by_id->blog_title}}</a>  Category name : {{$blog_details_by_id->category_name}}</h4>
            <p>{{$blog_details_by_id->long_description}}</p>
            
        </div>
    </div>
    
    <div class="form-group">
       @if(Auth::user())
        <table>
            <h3>Write Comment</h3> <br>
            <h4 style="color:green">
                @if(Session::has('message'))
                     {{session('message')}}
                @endif
            </h4>
            <br>
            {!! Form::open(['url' => '/save-comments', 'method' => 'post']) !!}
                
            <textarea rows="3" cols="70" name="comments" placeholder="Write comment here" required="" ></textarea>
            <input type="hidden" name="blog_id" value="{{ $blog_details_by_id->blog_id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <br>
            <br>
            <input type="submit" value="Post Comment">
           {!! Form::close() !!}
           </table>
       </div>
           @foreach($all_comments as $comment)
           <h4>{{$comment->name}}</h4>
           <p style="color:navy;font-size:15px">{{$comment->comments}}</p>
           <a style="color:green" href="">Reply</a>
           <br><br>
           @endforeach
        
       @endif
    
  

</div>
@endsection