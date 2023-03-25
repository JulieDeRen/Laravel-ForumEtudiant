<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Degree;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index()
    {
        //SELECT * FROM blog_post;
        // Si on veut juste 1 $blog=BlogPost::find(1);
        // return $blog[1];
        // tester forelse tableau vide @empty   $blog = [];
        $user=Student::all();
        return view('student.index', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $degree=Degree::all();
        $program=Program::all();
        $type=Type::all();
        $city=City::all();
        return view('/student/create', ['cities' => $city,
                                    'types'=>$type,
                                    'degrees'=>$degree,
                                    'programs'=>$program]);
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

        // ** Important que le formulaire soit de type multi encrypted */
        // return $request->has('image');
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        
        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        // $request->image->storeAs('images', $imageName);
        $request['photo']=$imageName;

        /*
            Pour enregistrer image dans le dossier Storage/images voici la technique 
            ** Besoin de la classe Storage en entête
        
            $image = $request->file('image');
            $url = Storage::putFileAs('images', $image, time(). '.' . $image->extension());
            $request['photo']=$url;

        */

        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'min:5|max:20'
        ]);

        $user = User::create([
            'name' => $request->name,
            'address' => $request ->address,
            'birthday' => $request ->birthday,
            'phone' => $request ->phone,
            'email' => $request ->email,
            'password' => $request ->password,
            'city_id' => $request ->city_id,
            'types_id' => $request->types_id,
            'photo'=>$request->photo,
        ]); 
        // return $user;
        $user->password = Hash::make($request->password);
        $user->save();

        $request->users_id = $user->id;
        if(!isset($request['degrees_id'])){
            $request['degrees_id']=1;
        }
        else{
            $request['degrees_id']=2;
        }
       
        
        $student = Student::create([
            'users_id'=> $request->users_id,
            'birthday'=> $request->birthday,
            'presentation'=> $request->presentation,
            'programs_id'=> $request->programs_id,
            'degrees_id'=>$request->degrees_id,
        ]);

        $student->save();
        
        // return redirect()->back()->withSuccess();
        return redirect(route('student.show', $user -> id));
    }


    // ****** Show is redirect to user controller *****

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $user)
    {
        $city=City::all();
        return view('student.edit', ['user'=>$user,
                                    'cities'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $user)
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
        $user->update([
            'birthday'=> $request->birthday,
            'presentation'=> $request->presentation,
            'programs_id'=> $request->programs_id,
            'degrees_id'=>$request->degrees_id,
        ]);
        return redirect(route('student.show', $user->id))->withSuccess('Article mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
        $student->delete();
        $user = new User;
        $user->delete($student->id);
        //BlogPost::destroy($blogPost);
        return redirect(route('student.index'));
    }

   

}