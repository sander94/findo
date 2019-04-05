@extends('layouts.main')

@section('content')
    <div class="hero-area js-hero-slides">
     <div class="hero-area__content-slides js-hero-height"><a class="hero-slider-arrow hero-slider-arrow--left js-change-hero-slide js-left" href="#"></a><a class="hero-slider-arrow hero-slider-arrow--right js-change-hero-slide js-right" href="#"></a>
       
     <?php $counter = 1;  ?>
      
      @foreach($promoevents as $promoevent)

       
        <div class="hero-area__each-content-slide js-hero-slide js-active-slide" style="background-image:url(
        {{ asset('images/events/sliders/'.$promoevent->slider_image.'') }} );" id="js-slide-{{ $counter }}">
          <div class="hero-area__outer-content-align">
           <!-- <div class="hero-area__banner-logo"><img src="{{ asset('images/temp/slider/logos/logo-olearys.svg') }}"></div> -->
            <div class="hero-area__content js-hero-content"><a href="event/{{ $promoevent->id }}">
                <h1>{{ $promoevent->title }}</h1></a></div>
          </div>
        </div>

        <?php $counter++; ?>

      @endforeach





      </div>
    </div>
    <!--
    <div class="content-slider js-slider content-slider--event-slider">
      <h3>Põnevad tegevused</h3>
      <div class="arrow-left js-slider-arrow js-left"><span></span></div>
      <div class="arrow-right js-slider-arrow js-right"><span></span></div>
      <div class="sliding-overflow js-sliding-block"><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/1.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/2.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/3.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/4.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Elektroonilise muusika ja visuaalse kunsti festival Moonland</h3>
            <p class="location">Rummu, Vasalemma vald, Eesti</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/5.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/6.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/7.png') }} );">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a>
      </div>
    </div>
  -->
    <div class="event-list">
      <div class="event-list__filter">
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle">Juuni</div>
          <div class="selectbox__content js-toggled-item js-multiselect">
            <div class="selectbox__option js-multiselect-option">Jaanuar</div>
            <div class="selectbox__option js-multiselect-option">Veebruar</div>
            <div class="selectbox__option js-multiselect-option">Märts</div>
            <div class="selectbox__option js-multiselect-option">Aprill</div>
            <div class="selectbox__option js-multiselect-option">Mai</div>
            <div class="selectbox__option js-multiselect-option">Juuni</div>
            <div class="selectbox__option js-multiselect-option">Juuli</div>
            <div class="selectbox__option js-multiselect-option">August</div>
            <div class="selectbox__option js-multiselect-option">September</div>
            <div class="selectbox__option js-multiselect-option">Oktoober</div>
            <div class="selectbox__option js-multiselect-option">November</div>
            <div class="selectbox__option js-multiselect-option">Detsember</div>
            <div class="multiselect-buttons">
              <div class="toggle-selections js-select-all">Vali kõik</div>
              <div class="toggle-selections js-deselect">Tühjenda valikud</div>
              <div class="btn solid colored small save-btn js-save">Salvesta valikud</div>
            </div>
          </div>
        </div>
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle">Kõik märksõnad</div>
          <div class="selectbox__content js-toggled-item js-multiselect">
            <div class="selectbox__option js-multiselect-option">Muusika</div>
            <div class="selectbox__option js-multiselect-option">Sport</div>
            <div class="selectbox__option js-multiselect-option">Toit</div>
            <div class="selectbox__option js-multiselect-option">Komöödia</div>
            <div class="selectbox__option js-multiselect-option">Teater</div>
            <div class="selectbox__option js-multiselect-option">Film</div>
            <div class="selectbox__option js-multiselect-option">Kunst</div>
            <div class="selectbox__option js-multiselect-option">Käsitöö</div>
            <div class="selectbox__option js-multiselect-option">Tants</div>
            <div class="selectbox__option js-multiselect-option">Muusika</div>
            <div class="selectbox__option js-multiselect-option">Film</div>
            <div class="selectbox__option js-multiselect-option">Teater</div>
            <div class="selectbox__option js-multiselect-option">Kirjandus</div>
            <div class="selectbox__option js-multiselect-option">Sport</div>
            <div class="selectbox__option js-multiselect-option">Fitness</div>
            <div class="selectbox__option js-multiselect-option">Tervis</div>
            <div class="selectbox__option js-multiselect-option">Toit</div>
            <div class="selectbox__option js-multiselect-option">Komöödia</div>
            <div class="selectbox__option js-multiselect-option">Networking</div>
            <div class="selectbox__option js-multiselect-option">Mäng</div>
            <div class="selectbox__option js-multiselect-option">Ajakirjandus</div>
            <div class="multiselect-buttons">
              <div class="toggle-selections js-select-all">Vali kõik</div>
              <div class="toggle-selections js-deselect">Tühjenda valikud</div>
              <div class="btn solid colored small save-btn js-save">Salvesta valikud</div>
            </div>
          </div>
        </div>
      </div>


 <div class="event-list__events">
      @foreach($events as $event)

     
        <div class="event-list__each-event"><a class="event-content" href="./event/{{ $event->id }}">
            <div class="event-date">{{ explode(".", $event->date)[0] }}</div>
            <div class="event-image" style="background-image: url({{ asset('images/events/thumb/'.$event->image.'') }} );"></div>
            <div class="event-heading">
              <h3>{{ $event->title }}</h3>
              <p class="location">{{ $event->location }}</p>
            </div></a>
          <div class="event-share js-toggle-wrap">
            <div class="event-share__dropdown js-slide-toggle">
              <ul class="social-share js-toggled-item align-right">
                <li class="facebook"><a href="#">Facebook</a></li>
                <li class="twitter"><a href="#">Twitter</a></li>
                <li class="email"><a href="#">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
      
      @endforeach
    </div>   

      
    </div>
@endsection