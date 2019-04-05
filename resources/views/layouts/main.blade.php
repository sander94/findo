<!DOCTYPE html>
<html>
  <head>
    <title>Findo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Roboto:300,300i,500,500i" rel="stylesheet">
  </head>
  <body>
    <div class="loading-screen">
      <div class="loader-icon"></div>
    </div>
    <div class="site-search js-site-search">
      <div class="site-search__dropdown js-toggle-wrap js-search-toggle">
        <div class="selectbox selectbox--search">
          <div class="selectbox__label js-slide-toggle"><span>Vali asukoht</span></div>
          <div class="selectbox__content js-toggled-item js-multiselect">
            <div class="selectbox__options">
              <div class="selectbox__option js-multiselect-option js-active">Tallinn</div>
              <div class="selectbox__option js-multiselect-option">Harjumaa</div>
              <div class="selectbox__option js-multiselect-option">Hiiumaa</div>
              <div class="selectbox__option js-multiselect-option">Ida-Virumaa</div>
              <div class="selectbox__option js-multiselect-option">Jõgevamaa</div>
              <div class="selectbox__option js-multiselect-option">Järvamaa</div>
              <div class="selectbox__option js-multiselect-option">Läänemaa</div>
              <div class="selectbox__option js-multiselect-option">Lääne-Virumaa</div>
              <div class="selectbox__option js-multiselect-option">Pärnumaa</div>
              <div class="selectbox__option js-multiselect-option">Põlvamaa</div>
              <div class="selectbox__option js-multiselect-option">Raplamaa</div>
              <div class="selectbox__option js-multiselect-option">Saaremaa</div>
              <div class="selectbox__option js-multiselect-option">Tartumaa</div>
              <div class="selectbox__option js-multiselect-option">Valgamaa</div>
              <div class="selectbox__option js-multiselect-option">Viljandi</div>
              <div class="selectbox__option js-multiselect-option">Võrumaa</div>
            </div>
            <div class="multiselect-buttons">
              <div class="toggle-selections js-select-all">Vali kõik</div>
              <div class="toggle-selections js-deselect">Tühjenda valikud</div>
              <div class="btn solid colored small save-btn js-save">Salvesta valikud</div>
            </div>
          </div>
        </div>
      </div>
      <div class="site-search__searchfield">
        <input type="text" placeholder="Otsi..."/><a href="search-results.html">
          <button value="Search"></button></a>
      </div>
    </div>
@yield('content')
    <div class="footer">
      <div class="inner-footer">
        <div class="footer--left-column">Findo</div>
        <div class="footer--right-column"> 
          <ul>
            <li><a href="#">Korraldajale</a></li>
            <li><a href="#">Link 2</a></li>
          </ul>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/client.global.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
  </body>
</html>