<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webboards</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <section class="hero is-primary">
      <!-- <div class="hero-head">
        <nav class="main-nav navbar">
          <div class="container">
            <div class="navbar-start">
              <a class="navbar-item" href="/">
                <h1 class="title is-5">Website</h1>
              </a>
            </div>
          </div>
        </nav>
      </div> -->

      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Webboard
          </h1>
          <h2 class="subtitle">
            Write your questions.
          </h2>
        </div>
      </div>
    </section>

    @yield('content')
    
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            <!-- <strong>Webboards</strong> by <span>Nat</span>. -->
            <br> Copyright @ 2019.
          </p>
        </div>
      </div>
    </footer>

    <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
      var options = {
        debug: 'info',
        placeholder: 'Compose an epic...',
        theme: 'snow'
      };

      var container = document.getElementById('editor');
      var editor = new Quill(container, options);
    </script>
  </body>
</html>
