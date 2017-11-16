<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_blog_data = DB::table('tbl_blog')
                ->where('publication_status',1)
                ->orderBy('blog_id','desc')
                ->get();
        $home_content=view('pages.home')
                ->with("all_blog",$all_blog_data);
        $sidebar=1;
        return view('master')
                    ->with('main_content',$home_content)
                    ->with('sidebar',$sidebar);
    }
    
    public function blogDetails($blog_id)
    {
        DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->increment('hit_count');
        $blog_info = DB::table('tbl_blog')
                        ->join('tbl_category','tbl_blog.category_id','=','tbl_category.category_id')
                        ->where('blog_id',$blog_id)
                        ->select('tbl_blog.*','tbl_category.category_name')
                        ->first();
        $comment_info = DB::table('comments')
                        ->join('users','users.id','=','comments.user_id')
                        ->where('blog_id',$blog_id)
                        ->where('publication_status',1)
                        ->select('comments.*','users.name','users.id')
                        ->get();
        $blog_details = view('pages.blog_details')
                            ->with('all_comments',$comment_info)
                            ->with('blog_details_by_id',$blog_info);
        $sidebar =1;
        return view('master')
                        ->with('main_content',$blog_details)
                        ->with('sidebar',$sidebar);
        
        
    } 
    
    public function categoryDetails($category_id)
    {
        $cat_details = DB::table('tbl_blog')
                            ->where('category_id',$category_id)
                            ->orderBy('category_id','desc')
                            ->get();
        
        $cat_details_page = view('pages.cat_details')
                            ->with('category_data',$cat_details);
         $sidebar =1;
        return view('master')
                        ->with('main_content',$cat_details_page)
                        ->with('sidebar',$sidebar);
    }
    public function comments(Request $request){
        $data = array();
        $data['blog_id'] = $request->blog_id;
        $data['user_id']= $request->user_id;
        $data['comments']= $request->comments;
        
        DB::table('comments')
                ->insert($data);
        $request->session()->flash('message','Your comments sended to approval');
        return Redirect::to('/blog-details/'.$request->blog_id);
    }
    public function aboutUs()
    {
        $about_content=view('pages.about');
         $sidebar=NULL;
        return view('master')
                    ->with('main_content',$about_content)
                    ->with('sidebar',$sidebar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
