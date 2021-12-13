<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="/css/app.css">
   <title>@yield('title')</title>
</head>
<body>
   @include('include.header')

   @if (Request::is('/'))
      @include('include.hero')
   @endif

   <div class="container mt-5">
      @include('include.message')
      <div class="row">
         <div class="col-8">
            @yield('content')
         </div>
         <div class="col-4">
            @include('include.aside')
         </div>
      </div>
   </div>

   @include('include.footer')
</body>
</html>