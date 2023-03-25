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
                <h2>Modifier {{$user->name}}</h2>
                <div class="page_link">
                  <a href="{{route('index')}}">Accueil</a>
                  <a href="{{route('user.index')}}">Finissants</a>
                  <a href="{{route('user.edit', $user->id)}}">Modifier</a>
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
            <div class="col-md-6">
                <div class="card">
                    <form method="post">
                        <!--passer la méthode PUT et aussi le token expired réémission du token-->
                    @csrf
                    @method('PUT')
                    
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">   
                                <div class="control-group col-12">
                                    <label for="name">Nom</label>
                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" required>
                                </div>
                                <div class="row-city">
                                    <div class="control-group col-6">
                                        <label for="address">Adresse</label>
                                        <input type="text" id="address" name="address" value="{{$user->address}}" class="form-control" required>
                                    </div>
                                    <div class="control-group col-6 col-city">
                                        <div class="">
                                            <label for="city_id">Ville</label>
                                        </div>
                                        <select name="city_id" id="city">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}" 
                                            @if ($user->city_id == $city->id)
                                                {{'selected="selected"'}}
                                            @endif >{{ $city->city_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group col-12">
                                    <label for="phone">Téléphone</label>
                                    <input type="phone" id="phone" name="phone" value="{{$user->phone}}" class="form-control" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="email">Courriel</label>
                                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="birthday">Date de naissance</label>
                                    <input type="date" id="birthday" name="birthday" value="{{$user->birthday}}" class="form-control" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="password">Mot de passe</label>
                                    <input type="text" id="password" name="password" class="form-control" required>
                                </div>
                           
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Modifier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->
@endsection