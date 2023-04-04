<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
 


class DocumentController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /* ------------ Documents Controller -------------- */
    public function index(){
        $document = Document::select('documents.id', 'documents.path', 'documents.description', 'users.name', 'categories.category')
        -> join('users', 'users.id', '=', 'documents.users_id')
        -> join('categories', 'categories.id', '=', 'documents.category_id')
        ->get();

        return view('document/document', ['documents' => $document]);
    }
    public function create()
    {
        $category=Category::all();
        return view('/document/create', ['categories' => $category]);
    }

    
    public function store(Request $request)
    {

        $file = $request->file('filepath');
        $fileName = time(). '.' . $file->extension();
        $url = Storage::putFileAs('public/documents', $file, $fileName);
        $request['path']=$fileName;
        
        $userId = Auth::id();
        $request['users_id'] =$userId;

        $document = Document::create([
            'path' => $request->path,
            'description' => $request ->description,
            'users_id' => $request ->users_id,
            'category_id'=> $request->category_id,
        ]);
        $document->save();
        return redirect(route('document.index'));

    }

    public function update(Request $request, Document $document)
    {
        $filepath = $request->file('filepath');
        if(isset($filepath)){
            $file = $request->file('filepath');
            $fileName = time(). '.' . $file->extension();
            $url = Storage::putFileAs('public/documents', $file, $fileName);
            $request['path']=$fileName;
        }
       
        $document->fill($request->all());
        $document->update();

        return redirect(route('document.index'))->withSuccess('Article mis à jour avec success');
    }

    public function edit(Document $document)
    {
        $category=Category::all();
        $document = Document::select('*')
        -> join('users', 'users.id', '=', 'documents.users_id')
        -> join('categories', 'categories.id', '=', 'documents.category_id')
        ->get();
        return view('document.edit', ['categories'=>$category]);
    }
    
    public function show(Document $document)
    {

        $category=Category::all();
        $document = Document::all();
        return view('document.show', ['document' => $document,
                                    'categories'=> $category]);

    }
    
    public function destroy(Document $document)
    {
        // return $request;
        $document->delete();
        //BlogPost::destroy($blogPost);
        return redirect(route('document.index'));
    }
}