<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ asset('/js/plugin/pace/pace.min.js') }}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="{{ asset('js/libs/jquery-2.0.2.min.js') }}"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="{{ asset('js/libs/jquery-ui-1.10.3.min.js') }} "><\/script>');
    }
</script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

<!-- BOOTSTRAP JS -->
{{HTML::script('js/bootstrap/bootstrap.min.js')}}

<!-- CUSTOM NOTIFICATION -->
{{HTML::script('js/notification/SmartNotification.min.js')}}


<!-- JARVIS WIDGETS -->
{{HTML::script('js/smartwidgets/jarvis.widget.min.js')}}

<!-- EASY PIE CHARTS -->
{{HTML::script('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}

<!-- SPARKLINES -->
{{HTML::script('js/plugin/sparkline/jquery.sparkline.min.js') }}

<!-- JQUERY VALIDATE -->
{{HTML::script('js/plugin/jquery-validate/jquery.validate.min.js') }}

<!-- JQUERY MASKED INPUT -->
{{HTML::script('js/plugin/masked-input/jquery.maskedinput.min.js') }}

<!-- JQUERY SELECT2 INPUT -->
{{HTML::script('js/plugin/select2/select2.min.js')}}

<!-- JQUERY UI + Bootstrap Slider -->
{{HTML::script('js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}

<!-- browser msie issue fix -->
{{HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js')}}

<!-- FastClick: For mobile devices -->
{{HTML::script('js/plugin/fastclick/fastclick.js')}}

<!--[if IE 7]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->



<!-- MAIN APP JS FILE -->
{{HTML::script('js/app.js')}}

<!-- PAGE RELATED PLUGIN(S) -->
    @yield('script')

