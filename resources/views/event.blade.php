@extends('layouts.main')

@section('content')
<a class="navigate-back" href="/"> <span>Tagasi avalehele</span></a>
    <article class="content-area content-area--event-details has-media">
      <div class="event-details__content-block event-details__intro-content">
        <div class="event-details__intro-content__image" style="
        background-image: url(        {{ asset('images/events/thumb/'.$event->image.'') }}          );"></div>
        <div class="event-details__intro-content__text">
          <h1>{{ $event->title }}</h1>
          <div class="time">{{ $event->date }}, kell {{ $event->time }}</div>
          <div class="location">{{ $event->location }}</div>
          <div class="event-share js-toggle-wrap">
            <div class="event-share__dropdown js-slide-toggle">Jaga
              <ul class="social-share js-toggled-item align-left">
                <li class="facebook"><a href="#">Facebook</a></li>
                <li class="twitter"><a href="#">Twitter</a></li>
                <li class="email"><a href="#">E-mail</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="event-details__content-block long-description">
        <div class="play-media">
          <div class="play-media__inner">
            <div class="play-media__btn js-toggle-active"></div><img src="{{ asset('images/temp/dragons.png') }}">
          </div>
        </div>
        <p>{!! nl2br($event->description) !!}</p>
      </div>
      <div class="event-details__content-block">
        <h3>Hinnainfo</h3>
        <p class="ticket-price">Pilet: {{ $event->ticket_price }} €</p>
        <p>{{ $event->additional_info }}</p>
      </div>
      <div class="event-details__content-block">
        <h3>Korraldaja:</h3>
        <p>{{ $event->organizator }}</p>
      </div>
      <div class="event-details__content-block">
        <ul class="event-tags">
          <li>muusika</li>
          <li>kontsert</li>
          <li>väliüritused</li>
          <li>staarid</li>
        </ul>
      </div>
      <div class="event-details__content-block">
        <div class="location-map"></div>
      </div>
    </article>
    <div class="content-slider js-slider">
      <div class="arrow-left js-slider-arrow js-left"><span></span></div>
      <div class="arrow-right js-slider-arrow js-right"><span></span></div>
      <div class="sliding-overflow js-sliding-block"><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/8.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/7.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/6.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/4.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Elektroonilise muusika ja visuaalse kunsti festival Moonland</h3>
            <p class="location">Rummu, Vasalemma vald, Eesti</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/5.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/4.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/3.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/2.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/1.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla, Saku vald</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/3.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/1.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>Estonian Voices Luke mõisa suvekontserdid</h3>
            <p class="location">Luke Mõisapark, Tartumaa</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/2.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>John Murrell Sarah Bernhardti viimane suvi</h3>
            <p class="location">Rehe küün, Üksnurme küla</p>
          </div></a><a class="js-slider-item small-event-teaser undefined" href="#" title="undefined">
          <div class="small-event-teaser__image" style="background-image: url({{ asset('images/temp/thumbnails/3.png') }});">
            <div class="image-mask"></div>
          </div>
          <div class="small-event-teaser__content">
            <h3>PET SHOP BOYS / Õllesummer Festival 2018</h3>
            <p class="location">Tallinna lauluväljak, Eesti </p>
          </div></a>
      </div>
    </div>
@endsection