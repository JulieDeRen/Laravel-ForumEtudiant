<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
 


class BlogController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /* ------------ Draft Template Pages Discards -------------- */
    public function index(){
        $category=Category::all();
        $blog = Article::select('articles.id', 'articles.title', 'users.name', 'articles.content', 'articles.photo AS blogphoto', 'articles.date', 'users.photo AS userphoto', 'users.name', 'users.address', 'users.phone', 'users.email', 'cities.city_name')
        -> join('users', 'users.id', '=', 'articles.users_id')
        -> join('cities', 'cities.id', '=', 'users.city_id')
        ->get();
        return view('blog/blog', ['blogs' => $blog,
                                'categories'=> $category]);
    }
    public function create()
    {
        $category=Category::all();
        return view('/blog/create', ['categories' => $category]);
    }
    public function store(Request $request)
    {
        // Storage::disk('local')->put('example.txt', 'Contents');
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        
        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        // $request->image->storeAs('images', $imageName);
        $request['photo']=$imageName;
        
        date_default_timezone_set("America/New_York");
        $request['date'] = date("Y/m/d");
        // $sessionId = Session::getId();
        // return new Response($sessionId);
        

        $userId = Auth::id();
        $request['users_id'] =$userId;
        // return $request;

        $blog = Article::create([
            'title' => $request->title,
            'content' => $request ->content,
            'date' => $request ->date,
            'photo' => $request->photo,
            'categories_id'=> $request->categories_id,
            'users_id'=> $request->users_id,
        ]);
        $blog->save();
        return redirect(route('blog.show', $blog -> id));

    }
    
    public function show(Article $blog)
    {

        $category=Category::all();
        $blogPost = Article::select('articles.id', 'articles.title', 'users.name', 'articles.content', 'articles.photo AS blogphoto', 'articles.date', 'users.photo', 'users.name', 'users.address', 'users.phone', 'users.email', 'cities.city_name')
        -> join('users', 'users.id', '=', 'articles.users_id')
        -> join('cities', 'cities.id', '=', 'users.city_id')
        -> where('articles.id', $blog['id'])
        ->get();
        return view('blog.show', ['blog' => $blogPost[0],
                                    'categories'=> $category]);



        // select * from blog_posts where id=$blogPost

        // return view('blog.show', ['blog' => $blog]);
    }
}
