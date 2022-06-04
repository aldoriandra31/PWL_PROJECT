<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.partials.head')
  <title>
    @yield('title', 'SMAN 1 AMBUNTEN')
  </title>
</head>

<body>
  {{-- @include('templates.partials.navbar') --}}
  <div class="hold-transition login-page bg-white">
    @yield('content')
  </div>

  @include('templates.partials.script')
</body>

</html>
