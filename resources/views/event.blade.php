@extends('layouts.main')

@section('content')
<style>
 .details + [data-readmore-toggle], .details[data-readmore]{display: block; width: 100%;} .details[data-readmore]{transition: height 200ms;overflow: hidden;}

 a.readmore-btn {
  width: 100px !important;
  display: table;
  margin-top: 20px;
 }

 a.readmore-btn i {
  margin-left: 10px;
 }

 a.readmore-btn {
  border-bottom: 0;
 }
</style>

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
                <li class="facebook"><a href="https://facebook.com/sharer/sharer.php?u=https://findo.ee/event/{{ $event->id }}">Facebook</a></li>
                <li class="twitter"><a href="https://twitter.com/intent/tweet?url=https://findo.ee/event/{{ $event->id }}">Twitter</a></li>
               <!--  <li class="email"><a href="#">E-mail</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="event-details__content-block long-description">
        <div class="play-media">
          <div class="play-media__inner">
            <div class="play-media__btn js-toggle-active"></div><!-- <img src="{{ asset('images/temp/dragons.png') }}"> -->
          </div>
        </div>
          <div class="details">
          {!! nl2br($event->description) !!}
          </div>

      </div>
      <div class="event-details__content-block">
        <h3>Hinnainfo</h3>
        <p class="ticket-price">Pilet: {{ $event->ticket_price }} €</p>
       <div class="details"> <p>{!! nl2br($event->additional_info) !!}</p> </div>
      </div>
      <div class="event-details__content-block">
        <h3>Korraldaja:</h3>
        <p>{!! nl2br($event->organizator) !!}</p>
      </div>
    <!--  <div class="event-details__content-block">
        <ul class="event-tags">
          <li>muusika</li>
          <li>kontsert</li>
          <li>väliüritused</li>
          <li>staarid</li>
        </ul>
      </div> -->
      <div class="event-details__content-block">
                                    <script>
                              var geocoder;
                              var map;
                              var address = "{{ $event->google_address }}";



                              function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 16,
                                  center: {lat: -34.397, lng: 150.644}
                                });
                                geocoder = new google.maps.Geocoder();
                                codeAddress(geocoder, map);
                                var input = document.getElementById('googleInput');
                                var autocomplete = new google.maps.places.Autocomplete(input);
                              }

                              function codeAddress(geocoder, map) {
                                geocoder.geocode({'address': address}, function(results, status) {
                                  if (status === 'OK') {
                                    map.setCenter(results[0].geometry.location);
                                    var marker = new google.maps.Marker({
                                      map: map,
                                      position: results[0].geometry.location
                                    });
                                  } else {
                                    
                                  }
                                });
                              }
                            </script>


                            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=et&region=ee&key=AIzaSyCFGE2zSlkuGfx9Vg_71R2BQYP54I0OuDM&sensor=false&callback=initMap" async defer>
                            </script>

                            <div id="map" class="location-map"> </div>
      </div>
    </article>
   
    
<script>/*!
 * @preserve
 *
 * Readmore.js jQuery plugin
 * Author: @jed_foster
 * Project home: http://jedfoster.github.io/Readmore.js
 * Licensed under the MIT license
 *
 * Debounce function from http://davidwalsh.name/javascript-debounce-function
 */
!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){"use strict";function e(t,e,i){var a;return function(){var n=this,o=arguments,r=function(){a=null,i||t.apply(n,o)},s=i&&!a;clearTimeout(a),a=setTimeout(r,e),s&&t.apply(n,o)}}function i(t){var e=++h;return String(null==t?"rmjs-":t)+e}function a(t){var e=t.clone().css({height:"auto",width:t.width(),maxHeight:"none",overflow:"hidden"}).insertAfter(t),i=e.outerHeight(),a=parseInt(e.css({maxHeight:""}).css("max-height").replace(/[^-\d\.]/g,""),10),n=t.data("defaultHeight");e.remove();var o=a||t.data("collapsedHeight")||n;t.data({expandedHeight:i,maxHeight:a,collapsedHeight:o}).css({maxHeight:"none"})}function n(t){if(!d[t.selector]){var e=" ";t.embedCSS&&""!==t.blockCSS&&(e+=t.selector+" + [data-readmore-toggle], "+t.selector+"[data-readmore]{"+t.blockCSS+"}"),e+=t.selector+"[data-readmore]{transition: height "+t.speed+"ms;overflow: hidden;}",function(t,e){var i=t.createElement("style");i.type="text/css",i.styleSheet?i.styleSheet.cssText=e:i.appendChild(t.createTextNode(e)),t.getElementsByTagName("head")[0].appendChild(i)}(document,e),d[t.selector]=!0}}function o(e,i){this.element=e,this.options=t.extend({},s,i),n(this.options),this._defaults=s,this._name=r,this.init(),window.addEventListener?(window.addEventListener("load",l),window.addEventListener("resize",l)):(window.attachEvent("load",l),window.attachEvent("resize",l))}var r="readmore",s={speed:100,collapsedHeight:200,heightMargin:16,moreLink:'<a href="#">Read More</a>',lessLink:'<a href="#">Close</a>',embedCSS:!0,blockCSS:"display: block; width: 100%;",startOpen:!1,beforeToggle:function(){},afterToggle:function(){}},d={},h=0,l=e(function(){t("[data-readmore]").each(function(){var e=t(this),i="true"===e.attr("aria-expanded");a(e),e.css({height:e.data(i?"expandedHeight":"collapsedHeight")})})},100);o.prototype={init:function(){var e=t(this.element);e.data({defaultHeight:this.options.collapsedHeight,heightMargin:this.options.heightMargin}),a(e);var n=e.data("collapsedHeight"),o=e.data("heightMargin");if(e.outerHeight(!0)<=n+o)return!0;var r=e.attr("id")||i(),s=this.options.startOpen?this.options.lessLink:this.options.moreLink;e.attr({"data-readmore":"","aria-expanded":this.options.startOpen,id:r}),e.after(t(s).on("click",function(t){return function(i){t.toggle(this,e[0],i)}}(this)).attr({"data-readmore-toggle":"","aria-controls":r})),this.options.startOpen||e.css({height:n})},toggle:function(e,i,a){a&&a.preventDefault(),e||(e=t('[aria-controls="'+_this.element.id+'"]')[0]),i||(i=_this.element);var n=t(i),o="",r="",s=!1,d=n.data("collapsedHeight");n.height()<=d?(o=n.data("expandedHeight")+"px",r="lessLink",s=!0):(o=d,r="moreLink"),this.options.beforeToggle(e,n,!s),n.css({height:o}),n.on("transitionend",function(i){return function(){i.options.afterToggle(e,n,s),t(this).attr({"aria-expanded":s}).off("transitionend")}}(this)),t(e).replaceWith(t(this.options[r]).on("click",function(t){return function(e){t.toggle(this,i,e)}}(this)).attr({"data-readmore-toggle":"","aria-controls":n.attr("id")}))},destroy:function(){t(this.element).each(function(){var e=t(this);e.attr({"data-readmore":null,"aria-expanded":null}).css({maxHeight:"",height:""}).next("[data-readmore-toggle]").remove(),e.removeData()})}},t.fn.readmore=function(e){var i=arguments,a=this.selector;return e=e||{},"object"==typeof e?this.each(function(){if(t.data(this,"plugin_"+r)){var i=t.data(this,"plugin_"+r);i.destroy.apply(i)}e.selector=a,t.data(this,"plugin_"+r,new o(this,e))}):"string"==typeof e&&"_"!==e[0]&&"init"!==e?this.each(function(){var a=t.data(this,"plugin_"+r);a instanceof o&&"function"==typeof a[e]&&a[e].apply(a,Array.prototype.slice.call(i,1))}):void 0}});</script>
<script>

$('.details').readmore({
  speed: 1000,
  collapsedHeight: 300,
  moreLink: '<a href="#" class="readmore-btn">Loe lisa <i class="fas fa-chevron-down"> </i></a>',
lessLink: '<a href="#" class="readmore-btn">Sulge <i class="fas fa-chevron-up"> </i></a>'
});
</script>


@endsection