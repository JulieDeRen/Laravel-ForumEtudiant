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
                <h2>Déposer un document</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/document">Documents</a>
                  <a href="/document-create">Déposer</a>
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
                    <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                            <div class="control-group col-12 col-city">
                                    <div class="">
                                        <label for="category_id">Catégorie</label>
                                    </div>
                                    <select name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" >{{ $category->category}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            <div class="row-city">
                                <div class="control-group col-12">
                                    <label for="description">Description</label>
                                    <textarea id="description" rows="12" name="description" class="form-control" required></textarea>
                                    @if ($errors->has('content'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('description') }}
                                        </div>                                
                                    @endif
                                </div>
                            </div>
                            <div class="row-city">
                                <div class="control-group col-12">
                                    <label for = "filepath" class="col-12">Document à déposer</label>
                                    <input type="file" class="col-12" name="filepath" />
                                </div>
                            </div>
                              
                        </div>

                        
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Publier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->
@endsection