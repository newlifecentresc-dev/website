<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>{{ $settings->site_title }}</title>
    @include('administrator.partials.meta')
    @include('administrator.partials.style')
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Error-->
        <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30"
            style="background-image: url({{ asset('administrator/media/error/bg1.jpg') }});">
            <!--begin::Content-->
            <h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem">404</h1>
            <p class="font-size-h3 text-muted font-weight-normal">OOPS! Something went wrong here</p>
            <!--end::Content-->
        </div>
        <!--end::Error-->
    </div>
    <!--end::Main-->

    @include('administrator.partials.script')
</body>
<!--end::Body-->

</html>
