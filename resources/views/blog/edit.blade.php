@extends('layouts.user')
@section('title', 'Create')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Rédiger un article</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/blog">Forum</a>
                  <a href="/blog-create">Rédiger</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->
<div class="container section_gap_top section_gap_bottom">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($blogs as $blog)
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif 
                            <div class="control-group col-12">
                                <label for="title">Titre</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{$blog->title}}">
                                @if ($errors->has('title'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('title') }}
                                </div>                                
                            @endif
                            </div>
                            <div class="control-group col-12 col-city">
                                    <div class="">
                                        <label for="categories_id">Catégorie</label>
                                    </div>
                                    <select name="categories_id" id="categories_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{ $category->category}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            <div class="row-city">
                                <div class="control-group col-12">
                                    <label for="content">Contenu</label>
                                    <textarea id="content" rows="12" name="content" class="form-control">{{$blog->content}}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('content') }}
                                        </div>                                
                                    @endif
                                </div>
                            </div>
                            <div class="row-city">
                                <div class="control-group col-12">
                                    <label for = "photo" class="col-12">Image</label>
                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-block">
                                                <strong>{{$message}}</strong>
                                            </div>
                                            <img src="{{ asset('images/'.Session::get('image')) }}" />
                                        @endif
                                            <input type="file" class="col-12" name="image" />
                                </div>
                            </div>
                              
                        </div>

                        
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Publier">
                        </div>
                    @endforeach
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->
@endsection