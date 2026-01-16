<script>
    var hostUrl = "assets/";
</script>

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('administrator/plugins/global/plugins.bundlef552.js?v=7.1.8') }}"></script>
<script src="{{ asset('administrator/plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8') }}"></script>
<script src="{{ asset('administrator/js/scripts.bundlef552.js?v=7.1.8') }}"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('administrator/plugins/custom/fullcalendar/fullcalendar.bundlef552.js?v=7.1.8') }}">
</script>
<script src="{{ asset('administrator/plugins/custom/datatables/datatables.bundlef552.js?v=7.1.8') }}">
</script>
<script src="{{ asset('administrator/js/pages/crud/datatables/basic/paginationsf552.js?v=7.1.8') }}">
</script>

<script src="{{ asset('administrator/js/pages/custom/login/login-generalf552.js?v=7.1.8') }}"></script>

<script src="{{ asset('administrator/js/pages/crud/forms/editors/summernotef552.js?v=7.1.8') }}"></script>
<!--begin::Page Scripts(used by this page)-->

<script src="{{ asset('administrator/js/pages/widgetsf552.js?v=7.1.8') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="crsf-token"]').attr('content')
        }
    });
    $('.delete-btn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                form.submit();
                Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                )
            }
        });
    });
</script>

<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success("{{ session('success') }}")

    @elseif (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        toastr.error("{{ session('error') }}")
    @endif
</script>

@yield('script')
