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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Service</h5>
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

            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Edit Service</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('services.update', $mainSub->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Browser Image</label>
                                    <div></div>
                                    <div class="form-group">
                                        <input type="file" class="custom-select form-control mb-3" id="customFile"
                                            name="image" />

                                        @if ($mainSub->getFirstMediaUrl('services'))
                                        <img src="{{ $mainSub->getFirstMediaUrl('services') }}" alt="" width="100">
                                        @else
                                        <img src="{{ $mainSub->image }}" alt="" width="100">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>URL</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="link" name="link"
                                        value="{{ $mainSub->link }}" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label>Button Text</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="btn_text" name="btn_text"
                                        value="{{ $mainSub->btn_text }}" placeholder="" />
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
