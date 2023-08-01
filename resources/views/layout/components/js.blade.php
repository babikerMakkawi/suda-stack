{{-- Main JS Files --}}


<script src="{{ asset('js/popper.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>

<script src="{{ asset('assets/vendor/tinymce/tinymce.js') }}"></script>

<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>

{{-- Main JS Files --}}


{{-- Extra Blugins JS Files --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>

{{-- Extra Blugins JS Files --}}





<!-- Active Page JS -->

<script>
    const activePage = window.location.pathname;
    const x = 0;

    const navLinks = document.querySelectorAll('.sidebar-nav a').forEach(link => {

        if (window.location.pathname == "/") {
            link.classList.add('active');
            x = 1;
        } else if (link.href.includes(`${activePage}`) && x == 0) {
            link.classList.add('active');
            console.log(link);
        }
    })
</script>

<!-- Active Page JS -->



<!-- ToastrError JS -->

<script>
    @if (Session::has('comment-sucess'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('comment-sucess') }}");
    @endif

    @if (Session::has('post-sucess'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('post-sucess') }}");
    @endif

    @if (Session::has('bookmark'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('bookmark') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
    @endif

    @if (Session::has('comment_bookmark'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('comment_bookmark') }}");
    @endif
</script>
























<!-- ToastrError JS -->

<!-- Vendor JS Files -->

{{-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script> --}}

<!-- Vendor JS Files -->
