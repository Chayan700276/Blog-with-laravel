
<!DOCTYPE HTML>
<html>
<head>
	<title>Personal Blog a Blogging Category Flat Bootstarp  Responsive Website Template | Home :: w3layouts</title>
	<link href="{{asset('public/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Personal Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
	/>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!--end slider -->
		<!--script-->
<script type="text/javascript" src="{{asset('public/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/easing.js')}}"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>


</head>
<body>
<!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
			  <a href="index.html"><img src="{{asset('public/images/logo.jpg')}}" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div>
				  <span class="menu"> </span> 
				   <ul>
						<li class="active"><a href="{{URL::to('/')}}">HOME</a></li>						
						<li><a href="{{URL::to('/about-us')}}">ABOUT</a></li>
                                                @if(Auth::guest())
						<li><a href="{{URL::to('/login')}}">Login</a></li>	
						<li><a href="{{URL::to('/register')}}">Register</a></li>
                                                @else
                                                <li>
                                                   <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                       Logout
                                                   </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                                @endif
						<li><a href="contact.html">CONTACT</a></li>						
						<div class="clearfix"> </div>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
	 </div>
</div>
<!--/header-->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
                        @if($sidebar != NULL))
			 <div class="col-md-8 content-main">
                        @endif
                        @if($sidebar == NULL)
                         <div class="col-md-12 content-main">
                         @endif
				@yield('main_content')
			  </div>
                        @if($sidebar != NULL)
                        
			  <div class="col-md-4 content-right">
                        
                        
				 <div class="recent">
					 <h3>Blog category</h3>
					 <?php
                                         $all_published_category=DB::table('tbl_category')
                                                                    ->where('publication_status',1)
                                                                    ->get();
                                         
                                         ?>
                                         <ul>
                                         @foreach($all_published_category as $v_category)
					 <li><a href="{{URL::to('cat-details/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></li>
					 @endforeach
					 </ul>
				 </div>
				 <div class="recent">
					 <h3>RECENT POSTS</h3>
					 <ul>
                                        <?php
                                          $recent_blog = DB::table('tbl_blog')
                                                     ->where('publication_status',1)
                                                     ->orderBy('blog_id', 'desc')
                                                     ->limit(3)
                                                     ->get();
                                         ?>
                                           @foreach($recent_blog as $r_blog)
					 <li><a href="{{URL::to('blog-details/'.$r_blog->blog_id)}}">{{$r_blog->blog_title}}</a></li> 
                                         @endforeach
					 </ul>
				 </div>
				 <div class="comments">
					 <h3>Popular Blog</h3>
					 <ul>
                                             
                                          <?php 
                                              $popular_blog =  DB::table('tbl_blog')
                                                        ->orderBy('hit_count','desc')
                                                        ->limit(3)
                                                        ->get();
                                          ?>
                                            @foreach($popular_blog as $blog)
					 <li><a href="{{URL::to('blog-details/'.$blog->blog_id)}}">{{$blog->blog_title}} </a>({{$blog->hit_count}}) </li>
					   @endforeach
					 </ul>
				 </div>
				 <div class="clearfix"></div>
				 <div class="archives">
					 <h3>ARCHIVES</h3>
					 <ul>
					 <li><a href="#">October 2013</a></li>
					 <li><a href="#">September 2013</a></li>
					 <li><a href="#">August 2013</a></li>
					 <li><a href="#">July 2013</a></li>
					 </ul>
				 </div>
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 <ul>
					 <li><a href="#">Vivamus vestibulum nulla</a></li>
					 <li><a href="#">Integer vitae libero ac risus e</a></li>
					 <li><a href="#">Vestibulum commo</a></li>
					 <li><a href="#">Cras iaculis ultricies</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
			  </div>
                        @endif
			  <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
	 <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
	 </div>
</div>

	
