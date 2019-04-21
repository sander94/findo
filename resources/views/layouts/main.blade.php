<!DOCTYPE html>
<html>
  <head>
    <title>Findo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="stylesheet" href="https://github.com/KidSysco/jquery-ui-month-picker/blob/master/src/MonthPicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Roboto:300,300i,500,500i" rel="stylesheet">
  </head>
  <body>
    <div class="loading-screen">
      <div class="loader-icon"></div>
    </div>
 <!--   <div class="site-search js-site-search">

      <div class="site-search__searchfield">
        <input type="text" placeholder="Otsi..."/><a href="search-results.html">
          <button value="Search"></button></a>
      </div>
    </div> -->
@yield('content')
    <div class="footer">
      <div class="inner-footer">
        <div class="footer--left-column">Findo</div>
        <div class="footer--right-column"> 
          <ul>
            <li><a href="#">Korraldajale</a></li>
          </ul>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/client.global.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
  </body>
</html>