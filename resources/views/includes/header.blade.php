<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-dark m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-secondary m-1" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="{{ url('/') }}" class="navbar-brand p-0">
        <h2 class="mx-5 pt-4 text-primary"><img src="{{ asset('frontend') }}/img/logo/BANTEN.png" height="80px" width="130px"></h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link active px-5 fs-4">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle px-5 fs-4" data-bs-toggle="dropdown">Tours</a>
                <div class="dropdown-menu m-0">
                    @foreach ($categoryf as $item)
                    <a href="{{ url('/tours', $item->slug) }}" class="dropdown-item">{{ $item->name }}</a> 
                    @endforeach
                </div>
            </div>
            <a href="{{ url('/maps') }}" class="nav-item nav-link px-5 fs-4">Maps</a>
        </div>
        <button type="button" class="btn text-dark px-5" data-bs-toggle="modal" data-bs-target="#search"><i
                class="fa fa-search" name='search'></i></button>       
    </div>
</nav>
<!-- Navbar End -->

<!-- Full Screen Search Start -->
<div class="modal fade" id="search" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ url('/tours') }}">
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3 "
                        placeholder="Type search keyword" name="search" id="search" autofocus>
                    <button class="btn btn-primary px-4" type="submit"><i class="bi bi-search"></i></button>
               
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@push('script')
<script type="text/javascript">

$('#search').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});
    </script>
@endpush

<!-- Full Screen Search End -->