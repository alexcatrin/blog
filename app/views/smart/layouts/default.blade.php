<!DOCTYPE html>
<html lang="en-us">
<head>
    @include('smart/include.head')
</head>
<body class="">
<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

<!-- HEADER -->
<header id="header">
    @include('smart/include.topmenu')
</header>
<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">


    <!-- left menu-->
    @include('smart/include.leftmenu')

</aside>
<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    @include('smart/include.ribon')
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    @yield('content')
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
Note: These tiles are completely responsive,
you can add as many as you like
-->
@include('smart/include.shortcut')
<!-- END SHORTCUT AREA -->

<!--================================================== -->

@include('smart/include.script')

</body>

</html>