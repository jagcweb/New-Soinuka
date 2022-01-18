<!doctype html>
<html>
  <head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../../assets/css/admin-styles.css">
    <title>Soinuka | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/images/logoSoinuka1.png">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
  </head>
  
  <body style="background:#1d1d1d;"> 
  <div class="loader-container">
    <div class="loader lds-ripple"><div></div><div></div></div>
  </div>

  @yield('content')

  </body>
  <script src="/js/app.js"></script>
  <script src="/js/bootstrap.js"></script>
</html>

