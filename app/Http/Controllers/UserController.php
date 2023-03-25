<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $type=Type::all();
        $city=City::all();
        return view('/user/create', ['cities' => $city,
                                    'types'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 

        $request->types_id = "1"; // student par défaut

        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'min:5|max:20'
        ]);
        //redirect->back()->withErrors([])->withInput

        $request->types_id = "1";
        $user = User::create([
            'name' => $request->name,
            'address' => $request ->address,
            'birthday' => $request ->birthday,
            'phone' => $request ->phone,
            'email' => $request ->email,
            'password' => $request ->password,
            'city_id' => $request ->city_id,
            'types_id' => $request->types_id,
        ]); 
        // return $user;
        $user->password = Hash::make($request->password);
        $user->save();
        // return redirect()->back()->withSuccess();
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

        return view('user.show', ['user' => $user]);
    }

    public function showstudent(User $user)
    {
        $student = User::select()
        -> join('students', 'users.id', '=', 'students.users_id')
        ->where('students.users_id', $user['id'])
        ->get();
        // $user = $student;
        // return $user->birthday;

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
        $city=City::all();
        return view('user.edit', ['user'=>$user,
                                    'cities'=>$city]);
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

    public function login()
    {
        return view('user.login');
    }

    public function authentification(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(!Auth::validate($credentials)):
            return redirect()->back()->withErrors(trans('auth.password'))->withInput();
        endif;
       
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
     
        Auth::login($user);
       
        return redirect()->intended(route('user.index'));

        // return  $credentials;
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
   

}

/*

        BlogPost::select()
        -> join('users', 'users.id', 'user_id')
        -> where('blog_posts.id', $blogPost)
        ->get();
        return view('blog.show', ['blog' => $blogPost[0]]);

*/

        // select * from blog_posts where id=$blogPost