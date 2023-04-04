@extends('layouts.user')
@section('title', 'Blog List')
@section('content')

 <!--================Home Banner Area =================-->
 <section class="banner_area banner_2">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Finissants</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/student">Finissants</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

<div class="container section_gap_top section_gap_bottom">
      <h2>Inscrivez-vous pour vous afficher.</h2>
      <a href="{{route('student.create')}}" class="btn btn-success">Je m'inscris</a>

      <div class="row justify-content-center d-flex align-items-center section_gap_top">
        @foreach($users as $user)
          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer" onclick="location.href=`{{route('student.show', $user->users_id)}}`">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="/uploads/photos_etudiants/{{$user->photo}}" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>{{ $user->name  ?? ''}}</h4>
              <p class="designation">{{ $user->phone  ?? ''}}</p>
              <div class="mb-4">
                <p>
                    {{ $user->address  ?? ''}}
                </p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
                <a href="#"><i class="ti-pinterest"></i></a>
              </div>
            </div>
          </div>
        @endforeach

    </div>
</div>

@endsection