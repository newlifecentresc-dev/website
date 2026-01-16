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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Banner</h5>
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
                            <h3 class="card-title">Create Banner</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Browser Image</label>
                                    <div></div>
                                    <div class="form-group">
                                        <input type="file" class="custom-select form-control mb-3" id="customFile" name="banner_image"/>
                                        <img src="{{ $banner->getFirstMediaUrl('banners') }}" alt="" width="50">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Banner Type</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="banner_condition" id="banner_condition">
                                        <option value="banner" {{ $banner->banner_condition == 'banner' ? ' selected' : '' }}>Banner</option>
                                        <option value="promo" {{ $banner->banner_condition == 'promo' ? ' selected' : '' }}>Promo</option>
                                    </select>
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
