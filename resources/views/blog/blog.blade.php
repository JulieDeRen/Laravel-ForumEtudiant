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
                <h2>Forum</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/blog">Forum</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area section_gap">
        <div class="container">
            <div class="row section_gap_bottom">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                    @foreach($blogs as $blog)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a href="#">{{$blog->category}}</a>
                                        <!--<a class="active" href="#">Technology,</a>
                                        <a href="#">Politics,</a>
                                        <a href="#">Lifestyle</a>-->
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a href="#">{{$blog->name}}<i class="ti-user"></i></a></li>
                                        <li><a href="#">{{$blog->date}}<i class="ti-calendar"></i></a></li>
                                        <!--<li><a href="#">1.2M Views<i class="ti-eye"></i></a></li>
                                        <li><a href="#">06 Comments<i class="ti-comment"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="/uploads/images/{{$blog->blogphoto}}" alt="{{$blog->title}}">
                                    <div class="blog_details">
                                        <a href="{{route('blog.show', $blog->id)}}">
                                            <h2>{{$blog->title}}</h2>
                                        </a>
                                        <p>{!!$blog->content!!}</p>
                                        <a href="{{route('blog.show', $blog->id)}}" class="blog_btn">Voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-left"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">09</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-right"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <!--<aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="assets/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
                            <p>Senior blog writer</p>
                            <div class="social_icon">
                                <a href="#"><i class="ti-facebook"></i></a>
                                <a href="#"><i class="ti-twitter"></i></a>
                                <a href="#"><i class="ti-github"></i></a>
                                <a href="#"><i class="ti-linkedin"></i></a>
                            </div>
                            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get. Boot camps have itssuppor
                                ters andits detractors.</p>
                            <div class="br"></div>
                        </aside>-->
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Catégories</h4>
                            <ul class="list cat-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{$category->category}}</p>
                                        <p>37</p>
                                    </a>
                                </li>
                            @endforeach
                              
                            </ul>
                            <!--<div class="br"></div>-->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Blog Area =================-->

    @endsection