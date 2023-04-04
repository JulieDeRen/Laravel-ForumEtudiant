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
                <h2>Inscription</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/student">Finissants</a>
                  <a href="/create">Inscription</a>
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
                    <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                                @if ($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('name') }}
                                </div>                                
                            @endif
                            </div>
                            <div class="row-city">
                                <div class="control-group col-6">
                                    <label for="address">Adresse</label>
                                    <input type="text" id="address" name="address" class="form-control" required>
                                    @if ($errors->has('address'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('address') }}
                                        </div>                                
                                    @endif
                                </div>
                                <div class="control-group col-6 col-city">
                                    <div class="">
                                        <label for="city_id">Ville</label>
                                    </div>
                                    <select name="city_id" id="city">
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" >{{ $city->city_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group col-12">
                                <label for="phone">Téléphone</label>
                                <input type="phone" id="phone" name="phone" class="form-control" required>
                                @if ($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('phone') }}
                                    </div>                                
                                @endif
                            </div>
                            <div class="control-group col-12">
                                <label for="email">Courriel</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>                                
                                @endif
                            </div>
                            <div class="control-group col-12">
                                <label for="birthday">Date de naissance</label>
                                <input type="date" id="birthday" name="birthday" class="form-control" required>
                                @if ($errors->has('birthday'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('birthday') }}
                                    </div>                                
                                @endif
                            </div>
                            <div class="control-group col-12">
                                <label for="password">Mot de passe</label>
                                <input type="text" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="control-group col-12 col-city">
                                <div class="">
                                    <label for="programs_id">Programme</label>
                                </div>
                                <select name="programs_id" id="programs_id">
                                    @foreach($programs as $program)
                                        <option value="{{$program->id}}" >{{ $program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group col-12">
                                    <label for="degrees_id">Avez-vous obtenu ce diplôme ?</label>
                                <input type="checkbox" id="degrees_id" class="form-control" name="degrees_id">
                                @if ($errors->has('degrees_id'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('degrees_id') }}
                                    </div>                                
                                @endif
                            </div>

                            <div class="control-group col-12">
                                <label for="presentation">Présentation</label>
                                <textarea id="presentation" rows="12" name="presentation" class="form-control" required></textarea>
                                @if ($errors->has('presentation'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('presentation') }}
                                    </div>                                
                                @endif
                            </div>
                
                            <div class="control-group col-12">
                                <div>
                                    <label for = "image">Photo</label>
                                </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong>{{$message}}</strong>
                                        </div>
                                        <img src="{{ asset('images/'.Session::get('image')) }}" />
                                    @endif
                                        <input type="file" name="image" />

                            </div>
                        </div>

                        
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Je m'inscris">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->
@endsection