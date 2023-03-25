@extends('layouts.user')
@section('title', 'Blog List')
@section('content')

 <!--================Home Banner Area =================-->
 <!--<section class="banner_area banner_2">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Finissants</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/user">Finissants</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!--================End Home Banner Area =================-->
<div class="container section_gap_top section_gap_bottom">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <form method="post">
                @csrf
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(!$errors->isEmpty())
                            <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                    {{ $error }}<br>
                            @endforeach
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                            <input type="submit" value="Connecter" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection