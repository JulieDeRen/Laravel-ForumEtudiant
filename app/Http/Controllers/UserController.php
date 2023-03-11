<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //SELECT * FROM blog_post;
        // Si on veut juste 1 $blog=BlogPost::find(1);
        // return $blog[1];
        // tester forelse tableau vide @empty   $blog = [];
        $user=User::all();
        return view('user.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city=City::all();
        return view('/user/create', ['cities' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'address' => $request ->address,
            'birthday' => $request ->birthday,
            'phone' => $request ->phone,
            'email' => $request ->email,
            'password' => $request ->password,
            'city_id' => $request ->city_id
        ]); // à noter que l'user_id va changer
        return redirect(route('user.show', $user -> id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
/*

        BlogPost::select()
        -> join('users', 'users.id', 'user_id')
        -> where('blog_posts.id', $blogPost)
        ->get();
        return view('blog.show', ['blog' => $blogPost[0]]);

*/

        // select * from blog_posts where id=$blogPost

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        {
            $city=City::all();
            return view('user.edit', ['user'=>$user,
                                        'cities'=>$city]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'address' => $request ->address,
            'birthday' => $request ->birthday,
            'phone' => $request ->phone,
            'email' => $request ->email,
            'password' => $request ->password,
            'city_id' => $request ->city_id
        ]);
        return redirect(route('user.show', $user->id))->withSuccess('Article mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        //BlogPost::destroy($blogPost);
        return redirect(route('user.index'));
    }
   

}