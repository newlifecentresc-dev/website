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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Profile</h5>
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

            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                           @include('administrator.pages.user._sidebar')
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->

                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <form class="form" method="post" action="{{ route('user.profile-update') }}">
                            @csrf
                            @method('put')

                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                                    <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal
                                        informaiton</span>
                                </div>
                                <div class="card-toolbar" style="position: absolute;top: 15px;left: 78%;">
                                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->

                            <!--begin::Body-->
                            <div class="card-body">

                                @include('administrator.partials.alert')

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="image-input image-input-outline" id="kt_profile_avatar">
                                            <div class="image-input-wrapper">
                                                <h1 class="text-center mt-12 text-uppercase">{{
                                                    mb_substr(auth()->user()->name, 0, 2, 'utf-8') }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{ auth()->user()->name }}"  name="name"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Role</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{ auth()->user()->role }}" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                value="{{ auth()->user()->email }}" placeholder="Email" name="email" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end::Body-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
