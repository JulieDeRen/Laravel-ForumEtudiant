@extends('layouts.user')
@section('title', 'Create')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
@foreach($users as $user)
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Modifier {{$user->name}}</h2>
                <div class="page_link">
                  <a href="{{route('index')}}">Accueil</a>
                  <a href="{{route('student.index')}}">Finissants</a>
                  {{--<a href="{{route('student.show', $user->users_id)}}">{{$user->name}}</a>--}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endforeach
</section>
    <!--================End Home Banner Area =================-->
<div class="container section_gap_top section_gap_bottom">
@foreach($users as $user)
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post" enctype="multipart/form-data">
                        <!--passer la méthode PUT et aussi le token expired réémission du token-->
                    @csrf
                    @method('PUT')
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
                                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                                @if ($errors->has('name'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('name') }}
                                </div>                                
                            @endif
                            </div>
                            <div class="row-city">
                                <div class="control-group col-6">
                                    <label for="address">Adresse</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{$user->address}}">
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
                                <input type="phone" id="phone" name="phone" class="form-control" value="{{$user->phone}}">
                                @if ($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('phone') }}
                                    </div>                                
                                @endif
                            </div>
                            <div class="control-group col-12">
                                <label for="email">Courriel</label>
                                <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}">
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>                                
                                @endif
                            </div>
                            <div class="control-group col-12">
                                <label for="birthday">Date de naissance</label>
                                <input type="date" id="birthday" name="birthday" class="form-control" value="{{$user->birthday}}">
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
                                        <option value="{{$program->id}}" 
                                        @if ($user->program_id == $program->id)
                                            {{'selected="selected"'}}
                                        @endif >{{ $program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group col-12">
                                    <label for="degrees_id">Avez-vous obtenu ce diplôme ?</label>
                                <input type="checkbox" id="degrees_id" class="form-control" name="degrees_id"
                                @if ($user->degrees_id == 1)
                                        {{'checked="true"'}}
                                @endif
                                />
                                @if ($errors->has('degrees_id'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('degrees_id') }}
                                    </div>                                
                                @endif
                            </div>

                            <div class="control-group col-12">
                                <label for="presentation">Présentation</label>
                                <textarea id="presentation" rows="12" name="presentation" class="form-control">{{$user->presentation}}</textarea>
                                @if ($errors->has('presentation'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('presentation') }}
                                    </div>                                
                                @endif
                            </div>
  @endforeach
                
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
                        
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Modifier">
                        </div>
                    </form>

                </div>
            </div>
        </div>
</div><!--/container-->
</div>

@endsection