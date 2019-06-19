<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Webboards</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
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
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.0.0/js/froala_editor.pkgd.min.js'></script>
    <script>
    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }
      var editor = new FroalaEditor('div#editor', {
                      toolbarBottom: true,
                      toolbarButtons: ['fontSize', '|', 'paragraphFormat', '|', 'bold', 'italic', 'underline', 'undo', 'redo', 'codeView'],
                      fontFamilySelection: true,
                      fontSizeSelection: true,
                      paragraphFormatSelection: true
                    })
      
      $(function() {
        $('#create-btn').click(function () {
          var content = editor.html.get()
          var username = $('#username').val()
          var email = $('#email').val()
          var subject = $('#subject').val()
          
          $('#username').removeClass('is-danger')
          $('#email').removeClass('is-danger')
          $('#subject').removeClass('is-danger')
          $('#editor').removeClass('editor-error')
          $('#username-error').addClass('is-hidden')
          $('#email-error').addClass('is-hidden')
          $('#content-error').addClass('is-hidden')
          $('#subject-error').addClass('is-hidden')
          $('#msg-fail').addClass('is-hidden')
          $('#msg-success').addClass('is-hidden')

          if (!username) {
            $('#username').addClass('is-danger')
            $('#username-error').removeClass('is-hidden')
          }

          if (!email || !validateEmail(email)) {
            $('#email').addClass('is-danger')
            $('#email-error').removeClass('is-hidden')
          }

          if (!subject) {
            $('#subject').addClass('is-danger')
            $('#subject-error').removeClass('is-hidden')
          }

          if (!content) {
            $('#editor').addClass('editor-error')
            $('#content-error').removeClass('is-hidden')
          }

          if (username && subject && (email && validateEmail(email)) && content) {
            $.ajax({
              method: "POST",
              url: "/topic/new",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { 
                username,
                email,
                subject,
                content
              }
            })
            .done(function(res) {
              var result = JSON.parse(res)
              if (result.err) {
                if (result.detail) {
                  if (result.detail.username) {
                    $('#username').addClass('is-danger')
                    $('#username-error').removeClass('is-hidden')
                  }

                  if (result.detail.email) {
                    $('#email').addClass('is-danger')
                    $('#email-error').removeClass('is-hidden')
                  }
                  
                  if (result.detail.subject) {
                    $('#subject').addClass('is-danger')
                    $('#subject-error').removeClass('is-hidden')
                  }

                  if (result.detail.content) {
                    $('#editor').addClass('editor-error')
                    $('#content-error').removeClass('is-hidden')
                  }
                } else {
                  if (result.msg) {
                    $('#msg-fail').removeClass('is-hidden')
                  }
                }
              } else {
                $('#msg-success').removeClass('is-hidden')
              }
            });
          }

          return false
        })

        $('#reply-btn').click(function () {
          var content = editor.html.get()
          var username = $('#username').val()
          
          $('#username').removeClass('is-danger')
          $('#username-error').addClass('is-hidden')
          $('#editor').removeClass('editor-error')
          $('#content-error').addClass('is-hidden')

          if (!username) {
            $('#username').addClass('is-danger')
            $('#username-error').removeClass('is-hidden')
          }

          if (!content) {
            $('#editor').addClass('editor-error')
            $('#content-error').removeClass('is-hidden')
          }

          if (username && content) {
            $.ajax({
              method: "POST",
              url: "/topic/reply",
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: { 
                username,
                content
              }
            })
            .done(function(res) {
              var result = JSON.parse(res)
              if (result.err) {
                if (result.detail.username) {
                  $('#username').addClass('is-danger')
                  $('#username-error').removeClass('is-hidden')
                }

                if (result.detail.content) {
                  $('#editor').addClass('editor-error')
                  $('#content-error').removeClass('is-hidden')
                }
              } else {
                $('#msg-success').removeClass('is-hidden')
              }
            });
          }

          return false
        })
      });
    </script>
  </body>
</html>
