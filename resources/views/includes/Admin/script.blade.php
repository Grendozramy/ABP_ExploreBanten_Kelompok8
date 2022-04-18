 <!-- Bootstrap core JavaScript-->
 <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
 <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{asset('backend')}}/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('backend')}}/js/demo/chart-area-demo.js"></script>
 <script src="{{asset('backend')}}/js/demo/chart-pie-demo.js"></script>

 {{-- MapBox --}}
 <!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
@stack('script')