<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();
class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        
    }
    public function auth_check()
    {
        $admin_id=Session::get('admin_id');
        //echo '----------'.$admin_id;
        if($admin_id == NULL)
        {
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {
        $this->auth_check();
        $admin_main_content=view('admin.pages.admin_dashboard');
        return view('admin.admin_master')
                            ->with('admin_main_content',$admin_main_content);
    }
    public function addCategory()
    {
        
        $this->auth_check();
        $add_category=view('admin.pages.add_category');
        return view('admin.admin_master')
                            ->with('admin_main_content',$add_category);
    }
    public function saveCategory(Request $request)
    {
        
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('tbl_category')
                ->insert($data);
        $request->session()->flash('message', 'Save Category Information Successfully !');
        return Redirect::to('/add-category');
    }
    public function manageCategory()
    {
        $this->auth_check();
        
        $all_category=DB::table('tbl_category')
                                    ->get();
        $manage_category=view('admin.pages.manage_category')
                                            ->with('all_category',$all_category);
        return view('admin.admin_master')
                            ->with('admin_main_content',$manage_category);
    }
    public function unpublishCategory($category_id)
    {
        $data=array();
        $data['publication_status']=0;
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }
    public function publishCategory($category_id)
    {
        $data=array();
        $data['publication_status']=1;
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }
    public function deleteCategory($category_id)
    {
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();
        return Redirect::to('/manage-category');
    }
    public function editCategory($category_id)
    {
        $category_info=DB::table('tbl_category')
                            ->where('category_id',$category_id)
                            ->first();
        $edit_category=view('admin.pages.edit_category')
                                            ->with('category_info',$category_info);
        return view('admin.admin_master')
                            ->with('admin_main_content',$edit_category);
    }
    public function updateCategory(Request $request,$category_id)
    {
       $data=array();
       $data['category_name']=$request->category_name;
       $data['category_description']=$request->category_description;
       $data['publication_status']=$request->publication_status;
       
//       echo '<pre>';
//       var_dump($data);
//       exit();
       DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        return Redirect::to('/manage-category');
    }
    public function addBlog()
    {
        $this->auth_check();
        $all_published_category=DB::table('tbl_category')
                                    ->where('publication_status',1)
                                    ->get();
        
        $add_blog=view('admin.pages.add_blog')
                            ->with('all_published_category',$all_published_category);
        return view('admin.admin_master')
               ->with('admin_main_content',$add_blog);
    
    }
    
     public function saveBlog(Request $request)
    {
        $this->auth_check();
        $data = array();
        $data['blog_title'] =        $request->blog_title;
        $data['admin_id']   =        Session::get('admin_id');
        $data['category_id'] =       $request->category_id;
        $data['short_description'] = $request->short_description;
        $data['long_description'] =        $request->long_description;
        $data['publication_status'] =        $request->publication_status;
      
        
        
        $image = $request->file('image');
        if($image)
        {
          $image_name = str_random(20);  
          $ext = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name . '.' . $ext;
          $upload_path = 'blog_image/';
          $image_url = $upload_path.$image_full_name;
          $succes = $image->move($upload_path, $image_full_name);
          if($succes)
          {
              $data['image'] = $image_url; 
              DB::table('tbl_blog')->insert($data);
              $request->session()->flash('message','save blog information succesfully');
              return Redirect::to('add-blog');
             
          }
      
          }else
          {
              DB::table('tbl_blog')->insert($data);
              $request->session()->flash('message','save blog information succesfully');
              return Redirect::to('add-blog');
          }
    }
    public function manageBlog(){
        $all_blog = DB::table('tbl_blog')
                        ->get();
       $manage_blog = view('admin.pages.manage_blog')
                           ->with('all_blog',$all_blog);
       return view('admin.admin_master')
                        ->with('admin_main_content',$manage_blog);
    }
    
    public function unpublishBlog($blog_id)
    {
        $data=array();
        $data['publication_status']=0;
        DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->update($data);
        return Redirect::to('/manage-blog');
    }
     public function publishBlog($blog_id)
    {
        $data=array();
        $data['publication_status']=1;
        DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->update($data);
        return Redirect::to('/manage-blog');
    }
    
    public function editBlog($blog_id){
        $blog_data = DB::table('tbl_blog')
                        ->join('tbl_category','tbl_blog.category_id','=','tbl_category.category_id')
                        ->where('blog_id',$blog_id)
                        ->select('tbl_blog.*','tbl_category.category_id','tbl_category.category_name')
                        ->get();
        $edit_blog = view('admin.pages.edit_blog')
                        ->with('blog_data',$blog_data);
        return view('admin.admin_master')
                        ->with('admin_main_content',$edit_blog);
    }
    public function updateBlog(Request $request){
        $data = array();
        $blog_id = $request->blog_id;
        $data['blog_title'] = $request->blog_title;
        $data['category_id'] = $request->category_id;
        $data['short_description'] = $request->short_description;
        $data['long_description'] = $request->long_description;
        $data['publication_status'] = $request->publication_status;
        
        $image = $request->file('image');
          if($image !=NULL){
              $image_name = str_random(20);
              $ext = strtolower($image->getClientOriginalExtension());
              $image_full_name = $image_name. '.' .$ext;
              $upload_path = 'blog_image/';
              $url =$upload_path.$image_full_name;
              $succes = $image->move($upload_path,$image_full_name);
              if($succes){
                  $data['image'] = $url;
                 $update_blog = DB::table('tbl_blog')
                          ->where('blog_id',$blog_id)
                          ->update($data);
                  @unlink($request->blog_old_image);
                $request->session()->flash('message',' blog information updated succesfully');
                return Redirect::to('/edit-blog/'.$blog_id);
              }
          }else{
               $update_blog = DB::table('tbl_blog')
                          ->where('blog_id',$blog_id)
                          ->update($data);
                $request->session()->flash('message',' blog information updated succesfully');
                return Redirect::to('/edit-blog/'.$blog_id);
          }
          
        
    }
    
    public function deleteBlog($blog_id){
        
        $blog_data = DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->get();
        foreach ($blog_data as $data)
        $img_link = $data->image;
        
        DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->delete();
        @unlink($img_link);
        return Redirect::to('/manage-blog');
        
    }
    public function logout()
    {
        Session::put('admin_id','');
        Session::put('admin_name','');
        Session::put('message','You are successfully Logout !');
        return Redirect::to('/admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageComment()
    {
        $all_cment = DB::table('comments')
                    ->get();
        
        $manage_cmt_page = view('admin.pages.manage_comment')
                        ->with('all_comments',$all_cment);
        return view('admin.admin_master')
                        ->with('admin_main_content',$manage_cmt_page);
    }
    
    public function publishComment($comments_id){
        $data = array();
        $data['publication_status'] =1;
        DB::table('comments')
                  ->where('comments_id',$comments_id)
                  ->update($data);
          return Redirect::back();           
    }
    
    public function unpublishComment($comments_id){
        $data = array();
        $data['publication_status'] =0;
        DB::table('comments')
                  ->where('comments_id',$comments_id)
                  ->update($data);
          return Redirect::back();           
    }

    
    public function deleteComment($comments_id){
        DB::table('comments')
                ->where('comments_id',$comments_id)
                ->delete();
        return Redirect::back();
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
