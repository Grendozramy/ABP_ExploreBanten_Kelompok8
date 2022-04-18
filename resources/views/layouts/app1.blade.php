<!-- Main app Content -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    
    @yield('content')
    

    @stack('prepend-script')
    @include('includes.script')
 
</body>

</html>
