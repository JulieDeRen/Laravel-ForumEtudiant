@extends('layouts.user')
@section('title', 'Blog List')
@section('content')

  <!--================Home Table Area =================-->
 <section class="banner_area banner_2">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Documents</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/document">Documents</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <div class="container section_gap_top section_gap_bottom"> 
    <h2>Voici les différents documents que vous pouvez télécharger.</h2>
      <div class="row justify-content-center section_gap_top">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Document</th>
              <th scope="col">Description</th>
              <th scope="col">Auteur</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Id</th>
              <th scope="col">Modifier</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            @foreach($documents as $document)
            <tr>
              <th scope="row"><a href="storage/documents/{{$document->path}}" download>{{$document->path}}</a></th>
              <td>{{$document->description}}</td>
              <td>{{$document->name}}</td>
              <td>{{$document->category}}</td>
              <td>{{$document->id}}</td>
              @if (Auth::user()->name == $document->name)
              <td><a href="{{route('document.edit', $document->id)}}" class="btn btn-primary">Modifier</a></td>
              <td>
                <form action="{{ route('document.delete', $document->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" value="{{$document->id}}"/> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Effacer
                  </button>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer le document</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sur d'effacer ce document ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-danger" value="Effacer">
         </form>
      </div>
    </div>
  </div>
</div>
    </div>
    <a href="{{route('document.create')}}" class="btn btn-success">Déposer un document</a>
  </div>

    <!--================Table Area =================-->

    @endsection