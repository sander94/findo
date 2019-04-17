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

  <form action="" method="get">
    <div class="event-list">
    




<script>

$(document).ready(function(){
    $('input:radio[name="month"]').change(function() {
        $('#currentMonth').html($(this).attr('value')+ '/');;
    });

    $('input:radio[name="year"]').change(function() {
        $('#currentYear').html($(this).attr('id'));
    });

        $('input:radio[name="region"]').change(function() {
        $('#currentRegion').html($(this).attr('id'));;
    });
});

</script>


  <div class="event-list__filter">


  <!-- TOGGLE WRAP -->
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle"><span id="currentMonth">{{ $currentMonth }}/</span><span id="currentYear">{{ $currentYear }}</span></div>
          <div class="selectbox__content js-toggled-item js-multiselect">
            <div>
                <input type="radio" name="year" class="year" value="2019" id="2019" 
                <?php if($currentYear == 2019) { echo "checked"; }  ?>>
                <label class="yearselect" for="2019">2019</label>

                <input type="radio" name="year" class="year" value="2020" id="2020" <?php if($currentYear == 2020) { echo "checked"; }  ?>>
                <label class="yearselect" for="2020">2020</label>
            </div>

            <div>
            @foreach($months as $month)
              <input type="radio" name="month" class="month" value="{{ $month->number }}" id="{{ $month->month }}" 
              <?php if($currentMonth == $month->number) { echo "checked"; } ?> >
                           <label class="monthselect" for="{{ $month->month }}">{{ $month->month }}</label>
            @endforeach
            </div>


          </div>
        </div>
<!-- TOGGLE WRAP END -->


<!-- TOGGLE WRAP -->
        <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle" id="currentRegion"> {{ $currentRegion }} </div>
             <div class="selectbox__content js-toggled-item js-multiselect">

                  @foreach($regionals as $key)
                 
                   <input type="radio" name="region" class="region" value="{{ $key->id }}" id="{{ $key->region }}" <?php if(isset($_GET['region'])) { if($_GET['region'] == $key->id ) { echo "checked"; } } ?> >
                   <label class="regionselect" for="{{ $key->region }}"> {{ $key->region }} </label>
                 
                  @endforeach
      
              </div>
        </div>
<!-- TOGGLE WRAP END -->



<!-- TOGGLE WRAP -->
  <?php /*      <div class="selectbox selectbox--default selectbox--large js-toggle-wrap">
          <div class="selectbox__label js-slide-toggle" id="currentTags"> Märksõnad </div>
             <div class="selectbox__content js-toggled-item js-multiselect">
                  @foreach($tags as $tag)
                   <input type="checkbox" name="tag[]" class="tag" value="{{ $tag->id }}" id="{{ $tag->tag }}" <?php if(isset($_GET['tag'])) { if(in_array($tag->id, $_GET['tag'] )) { echo "checked"; } } ?> >
                   <label class="tagselect" for="{{ $tag->tag }}"> {{ $tag->tag }} </label>
                  @endforeach
              </div>
        </div>
      */ ?>
<!-- TOGGLE WRAP END -->





      <button class="find-btn">Leia</button>

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

      
    </div></form>
@endsection