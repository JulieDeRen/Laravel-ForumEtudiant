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
                <h2>Nos coordonnées</h2>
                <div class="page_link">
                  <a href="/">Accueil</a>
                  <a href="/contact">Coordonnées</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
      <div class="container">
      <iframe class="mapBox" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2793.9731813795765!2d-73.55548818549524!3d45.55086503567913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91bf5bacbeffd%3A0x68ff300997eff5c!2sColl%C3%A8ge%20de%20Maisonneuve!5e0!3m2!1sfr!2sca!4v1678334503974!5m2!1sfr!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!--<div
          id="mapBox"
          class="mapBox"
          data-lat="40.701083"
          data-lon="-74.1522848"
          data-zoom="13"
          data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
          data-mlat="40.701083"
          data-mlon="-74.1522848"
        ></div>-->
        <div class="row">
          <div class="col-lg-3">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-home"></i>
                <h6>Montréal, Québec</h6>
                <p>Boulevard Sherbrook E.</p>
              </div>
              <div class="info_item">
                <i class="ti-headphone"></i>
                <h6><a href="#">(514) 254-7131</a></h6>
                <p>Lun à Ven 9am à 6 pm</p>
              </div>
              <div class="info_item">
                <i class="ti-email"></i>
                <h6><a href="#">info@cmaissonneuve.qc.ca</a></h6>
                <p>Envoyez-nous un message !</p>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <form
              class="row contact_form"
              action="contact_process.php"
              method="post"
              id="contactForm"
              novalidate="novalidate"
            >
              <div class="col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Votre nom"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Votre nom'"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter email address"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'"
                    required=""
                  />
                </div>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="subject"
                    name="subject"
                    placeholder="Le sujet"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Le sujet'"
                    required=""
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Votre message"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Votre message'"
                    required=""
                  ></textarea>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" value="submit" class="btn primary-btn">
                  Envoyer
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--================Contact Area =================-->

   @endsection
