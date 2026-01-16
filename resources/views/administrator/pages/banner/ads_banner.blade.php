@extends('administrator.layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Advert Banner</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            @include('administrator.partials.alert')

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Media Advert</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th class="text-center pr-0">Background Image</th>
                                <th class="text-center pr-0">Image</th>
                                <th class="text-center pr-0">Title</th>
                                <th class="text-center pr-0">Info</th>
                                <th class="text-center pr-0">Button Text</th>
                                <th class="text-center pr-0">link</th>
                                <th class="text-center pr-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\MediaAds::get() as $item)
                            <tr>
                                <td class="text-center pr-0">
                                    <img width="50" src="{{ $item->getFirstMediaUrl('bg_media_ads') }}" alt="bg_media_ads">
                                </td>
                                <td class="text-center pr-0">
                                    <img width="50" src="{{ $item->getFirstMediaUrl('media_ads') }}" alt="media_ads">
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->title }}
                                </td>
                                <td class="text-center pr-0">
                                    {{ mb_substr($item->info, 0, 50, 'utf-8') }}...
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->btn_text }}
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->link }}
                                </td>
                                <td class="text-center pr-0">

                                    <a href="{{ route('banner.advert.edit', $item->id) }}"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/administrator/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                    <path
                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

     <!--begin::Entry-->
     <div class="d-flex flex-column-fluid mt-10">
        <!--begin::Container-->
        <div class="container">

            @include('administrator.partials.alert')

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">Outreach Advert</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th class="text-center pr-0">Background Image</th>
                                <th class="text-center pr-0">Image</th>
                                <th class="text-center pr-0">Title</th>
                                <th class="text-center pr-0">Info</th>
                                <th class="text-center pr-0">Button Text</th>
                                <th class="text-center pr-0">link</th>
                                <th class="text-center pr-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\Outreach::get() as $item)
                            <tr>
                                <td class="text-center pr-0">
                                    <img width="50" src="{{ $item->getFirstMediaUrl('bg_outreach') }}" alt="bg_outreach">
                                </td>
                                <td class="text-center pr-0">
                                    <img width="50" src="{{ $item->getFirstMediaUrl('outreach') }}" alt="outreach">
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->title }}
                                </td>
                                <td class="text-center pr-0">
                                    {{ mb_substr($item->info, 0, 50, 'utf-8') }}...
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->btn_text }}
                                </td>
                                <td class="text-center pr-0">
                                    {{ $item->link }}
                                </td>
                                <td class="text-center pr-0">

                                    <a href="{{ route('banner.outreach.edit', $item->id) }}"
                                        class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/administrator/media/svg/icons/Communication/Write.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                    <path
                                                        d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
