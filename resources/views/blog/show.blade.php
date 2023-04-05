@extends('layouts.user')
@section('title', 'Blog List')
@section('content')

    <!--================Home Banner Area =================-->
    <!--<section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>{{$blog->title}}</h2>
                <div class="page_link">
                  <a href="{{route('index')}}">Accueil</a>
                  <a href="{{route('blog.index')}}">Forum</a>
                  <a href="{{route('blog.show', $blog->id)}}">{{$blog->title}}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="/uploads/images/{{$blog->blogphoto}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <div class="post_tag">
                                    <a href="#">{{$blog->category}}</a>
                                </div>
                                <ul class="blog_meta list">
                                    <li><a href="#">{{$blog->name}}<i class="ti-user"></i></a></li>
                                    <li><a href="#">{{$blog->date}}<i class="ti-calendar"></i></a></li>
                                    <!--<li><a href="#">1.2M Views<i class="ti-eye"></i></a></li>
                                    <li><a href="#">06 Comments<i class="ti-comment"></i></a></li>-->
                                </ul>
                                <ul class="social-links">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#"><i class="ti-github"></i></a></li>
                                    <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details mb-3">
                            <h2>{{$blog->title}}</h2>
                            <p class="excert">
                               {!!$blog->content!!}
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <!--<div class="quotes">
                                Le collège de Maisonneuve est fière d'avoir mis en place ce forum oû tous les élèves inscrits peuvent publier des articles et des travaux.  Le collège de Maisonneuve ne vérifie pas la véracité des articles qui sont publiés sur ce forum.  Ainsi, le lecteur reconnaît avoir été avisé que cet article ne peut pas être cité comme une référence et qu'il doit approfondir ses recherches afin de se forger une opinion étayée par des faits vérifiés. 
                            </div>-->
                            <div class="row">
                                <div class="col-lg-12 mt-25">
                                    <hr>
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <div class="row justify-content-center">
                                    <h2 class="mb-3 mt-3">Mot du collège</h2>
                                        <div class="quotes">
                                        <p>
                                        Le collège de Maisonneuve est fière d'avoir mis en place ce forum oû tous les élèves inscrits peuvent publier des articles et des travaux.  Le collège de Maisonneuve ne vérifie pas la véracité des articles qui sont publiés sur ce forum.  Ainsi, le lecteur reconnaît avoir été avisé que cet article ne peut pas être cité comme une référence et qu'il doit approfondir ses recherches afin de se forger une opinion étayée par des faits vérifiés. 
                                        </p>
                                        <p>
                                        Ce forum étudiants rassemble des publications étudiantes de différents programmes, permettant ainsi le partage d'informations, la collaboration et le soutien mutuel, ainsi que la publication d'articles pour établir la crédibilité et développer le réseau professionnel.
                                        </p>

                                        <p>En utilisant cet outil, les étudiants peuvent développer des compétences en communication, en écriture et en recherche. Participer à des discussions en ligne et écrire des articles peut améliorer leur capacité à communiquer clairement, à écrire de manière efficace et à mener des recherches approfondies.</p>

                                        <p>En somme, ce forum et la publication d'articles est un moyen précieux pour que les étudiants s'impliquent dans leur communauté et de développent leurs compétences professionnelles. <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                        <div class="blog_right_sidebar fiche">
                            <aside class="single_sidebar_widget search_widget">
                            @if (Auth::user()->id == $blog->users_id)
                            <div class="container flex-row">
                                <div>
                                    <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success">Modifier</a>
                                </div>
                                <!-- Button trigger modal -->
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Effacer
                                    </button>
                                </div>
                            </div>
                            @endif
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Posts">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget author_widget" onclick="location.href=`{{route('student.show', $blog->users_id)}}`">
                                <img class="author_img rounded-circle" src="/uploads/photos_etudiants/{{$blog->userphoto}}" alt="">
                                <h4>{{$blog->name}}</h4>
                                <p>{{$blog->email}}</p>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter"></i></a>
                                    <a href="#"><i class="ti-github"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                                <p>{{$blog->presentation}}</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Articles en vedette</h3>
                                <div class="media post_item">
                                    <img src="/assets/img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Space The Final Frontier</h3>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="/assets/img/blog/popular-post/post2.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>The Amazing Hubble</h3>
                                        </a>
                                        <p>02 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="/assets/img/blog/popular-post/post3.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Astronomy Or Astrology</h3>
                                        </a>
                                        <p>03 Hours ago</p>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="/assets/img/blog/popular-post/post4.jpg" alt="post">
                                    <div class="media-body">
                                        <a href="blog-details.html">
                                            <h3>Asteroids telescope</h3>
                                        </a>
                                        <p>01 Hours ago</p>
                                    </div>
                                </div>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget ads_widget">
                                <a href="#"><img class="img-fluid" src="assets/img/blog/add.jpg" alt=""></a>
                                <div class="br"></div>
                            </aside>
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
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <p>
                                    Here, I focus on a range of items and features that we use in life without
                                    giving them a second thought.
                                </p>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="ti-email" aria-hidden="true"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns">Subcribe</a>
                                </div>
                                <p class="text-bottom">You can unsubscribe at any time</p>
                                <div class="br"></div>
                            </aside>
                            <aside class="single-sidebar-widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Adventure</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Lifestyle</a></li>
                                    <li><a href="#">Adventure</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                        <h4>05 Commentaires</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">répondre</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/img/blog/c2.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list left-padding">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/img/blog/c3.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Annie Stephens</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/img/blog/c4.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="assets/img/blog/c5.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Ina Hayes</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-form">
                        <h4>Laisser un commentaire</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" id="name" placeholder="Votre nom" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Votre nom'">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" id="email" placeholder="Votre courriel"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre courriel'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Le sujet" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Le sujet'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn">Envoyer</a>
                        </form>
                    </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Effacer l'article</h5>
                        <span class="material-symbols-outlined" data-bs-dismiss="modal" aria-label="Close">
                            close
                            </span>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir effacer l'article : {{$blog->title}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <form action="{{route('blog.delete', $blog->id)}}" method = "post">
                        @csrf
                        @method('delete')

                            <input type="submit" class="btn btn-danger" value="Effacer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!--================Blog Area =================-->

   @endsection