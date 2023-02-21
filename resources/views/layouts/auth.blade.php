<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include('includes.auth.meta')

    <title>

        @yield('title') | MeetDoctor 
        {{-- Dynamic Title --}}
    </title>

    @stack('before-style')
        @include('includes.auth.style')
    @stack('after-style')

  </head>
  <body>

    {{-- @include('components.auth.header') --}}
        @yield('content')
    {{-- @include('components.auth.footer') --}}

    @stack('before-script')
        @include('includes.auth.script')
    @stack('after-script')

    {{-- Modals untuk dipanggil di patch manapun --}}

  </body>
</html>