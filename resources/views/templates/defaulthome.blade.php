<!DOCTYPE html>
<html lang="en">
@include('partials._head')

  <body>
  @include('partials._alerts')
    @yield('content') 
    <!-- /page content -->
    
    @include('partials._script')
  </body>
</html>
