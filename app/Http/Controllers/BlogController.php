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
        $blog = Article::select('articles.users_id', 'articles.id', 'articles.title', 'users.name', 'articles.content', 'articles.photo AS blogphoto', 'articles.date', 'users.photo AS userphoto', 'users.name', 'users.address', 'users.phone', 'users.email', 'cities.city_name')
        -> join('users', 'users.id', '=', 'articles.users_id')
        -> join('cities', 'cities.id', '=', 'users.city_id')
        ->get();

        // Si pas de photo de profil, ajouter une photo
        foreach($blog as $ablogPost){
            $ablogPost['resume']="";
            if(!isset($ablogPost['userphoto'])){
                if($ablogPost['userphoto']==null){
                    $ablogPost['userphoto']='testimonials-2.jpg';
                }
            }
            if(!isset($ablogPost['blogphoto'])){
                if($ablogPost['blogphoto']==null){
                    $ablogPost['blogphoto']='testimonials-2.jpg';
                }
            }
            $maxWords = 20;
            // Ref : chatGPT + Stackoverflow
            // Count the total number of words in the string
            $total_words = preg_match_all('/\p{L}+/u', $ablogPost['content']);

            // If the total number of words is less than or equal to the maximum, return the original string
            if ($total_words <= $maxWords) {
            $result = $ablogPost['content'];
            } else {
            // Otherwise, extract the first 10 words (including diacritical marks) from the string
            $words = preg_split('/\s+/', $ablogPost['content']);
            $result = mb_substr($ablogPost['content'], 0, mb_strlen(implode(' ', array_slice($words, 0, $maxWords)), 'UTF-8'), 'UTF-8');
            
            // Add an ellipsis at the end of the result
            $result .= '...';
            }

            $ablogPost['content'] = $result; // Output: Je suis étudiant en informatique. J'adore apprendre de nouvelles choses !
            /*
            $length = str_word_count($ablogPost['content']);
            if ($length > $maxWords) {
                $words = str_word_count($ablogPost['content'], 2); // split the string into an array of words 
                // return $words;
                $newString = implode(' ', array_slice($words, 0, $maxWords)); // take the first 20 words and join them back into a string
                $ablogPost['content']=$newString . "...";
            } */
        }
        // return $blog;

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
        // Traiter sauts de lignes
        // Ref : https://www.php.net/manual/en/function.str-replace.php
        $str     = $request->content;
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';

        // Processes \r\n's first so they aren't converted twice.
        $newstr = str_replace($order, $replace, $str);
        $request['content'] = $newstr;
        // return $request;
        
        // Storage::disk('local')->put('example.txt', 'Contents');
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        
        // Public Folder
        $request->image->move(public_path('uploads/images'), $imageName);
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
        $blogPost = Article::select('articles.users_id', 'articles.id AS id', 'articles.title', 'users.name', 'articles.content', 'articles.photo AS blogphoto', 'articles.date', 'users.photo AS userphoto', 'users.name', 'users.address', 'users.phone', 'users.email', 'cities.city_name')
        -> join('users', 'users.id', '=', 'articles.users_id')
        -> join('cities', 'cities.id', '=', 'users.city_id')
        -> where('articles.id', $blog['id'])
        ->get();
        // return $blogPost;
        // Si pas de photo de profil, ajouter une photo
        foreach($blogPost as $ablogPost){
            if(!isset($ablogPost['userphoto'])){
                if($ablogPost['userphoto']==null){
                    $ablogPost['userphoto']='testimonials-2.jpg';
                }
            }
            if(!isset($ablogPost['blogphoto'])){
                if($ablogPost['blogphoto']==null){
                    $ablogPost['blogphoto']='testimonials-2.jpg';
                }
            }
        }
        // passer en param l'objet et non le tableau d'objet pour itérer $blogPost[0];

        return view('blog.show', ['blog' => $blogPost[0],
                                    'categories'=> $category]);

    }

    public function edit(Article $blog)
    {
        $category=Category::all();
        return view('blog.edit', ['blog' => $blog,
                                        'categories'=>$category]);
    }
    public function update(Request $request, Article $blog)
    {
        if(isset($request['content'])){
            // Traiter sauts de lignes
            // Ref : https://www.php.net/manual/en/function.str-replace.php
            $str     = $request->content;
            $order   = array("\r\n", "\n", "\r");
            $replace = '<br />';

            // Processes \r\n's first so they aren't converted twice.
            $newstr = str_replace($order, $replace, $str);
            $request['content'] = $newstr;
        }
        
        if(isset($request->validate)){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);
    
            $imageName = time().'.'.$request->image->extension();
            
            // Public Folder
            $request->image->move(public_path('uploads/images'), $imageName);
            // $request->image->storeAs('images', $imageName);
            $request['photo']=$imageName;
            $blog->fill($request->all());
            $blog->update();
        }
        else{
            $blog->fill($request->all());
            $blog->update(); 
        }
        
        return redirect(route('blog.index'))->withSuccess('Article mis à jour avec success');
    }

    public function destroy(Article $blog)
    {
        // return $request;
        $blog->delete();
        //BlogPost::destroy($blogPost);
        return redirect(route('blog.index'));
    }

}
