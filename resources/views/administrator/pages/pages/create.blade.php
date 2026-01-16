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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Create Page</h5>
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
                            <h3 class="card-title">Create page</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="slug" id="slug">
                                        <option value="">---- Select ----</option>
                                        @foreach ($menuList as $menu)
                                        <option value="{{ $menu->slug }}">{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <div></div>
                                    <textarea class="summernote" id="kt_summernote_1" name="content" cols="30" rows="10">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="status" id="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
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
