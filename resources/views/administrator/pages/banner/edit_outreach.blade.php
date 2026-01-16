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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Edit Outreach Avert</h5>
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

                        <!--begin::Form-->
                        <form class="form" action="{{ route('banner.outreach.update', $outreach->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $outreach->title }}" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label>Info</label>
                                    <div></div>
                                    <textarea class="form-control" id="info" name="info" cols="10" rows="10">{{ $outreach->info }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Browser Background Image</label>
                                    <div></div>
                                    <div class="form-group">
                                        <input type="file" class="custom-select form-control mb-3" id="customFile" name="bg_image"/>
                                        <img src="{{ $outreach->getFirstMediaUrl('bg_outreach') }}" alt="{{ $outreach->title }}" width="50">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Browser Image</label>
                                    <div></div>
                                    <div class="form-group">
                                        <input type="file" class="custom-select form-control mb-3" id="customFile" name="image"/>
                                        <img src="{{ $outreach->getFirstMediaUrl('outreach') }}" alt="{{ $outreach->title }}" width="50">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Button Text</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="btn_text" name="btn_text"
                                        value="{{ $outreach->btn_text }}" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label>Link</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="link" name="link"
                                        value="{{ $outreach->link }}" placeholder="" />
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
