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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Create Menu</h5>
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
                            <h3 class="card-title">Create Menu</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Menu Title</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder=""/>
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">Is Parent: </label>
                                    <div></div>
                                    <div class="form-check">
                                        <input type="checkbox" id="is_parent" type="checkbox" class="form-check-input" name="parent_id" value="{{ '0' }}" checked>
                                        <label class="form-check-label" for="parent_id">YES</label>
                                    </div>
                                </div>

                                <div class="form-group d-none" id="parent_cat_div">
                                    <label for="parent_id">Parent Menu</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="">--- Parent Menu ---</option>
                                        @foreach ($parent_menus as $menu)
                                        <option value="{{ $menu->id }}" {{ old('parent_id') == $menu->id ? 'selected' : '' }}>{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <div></div>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order') }}" placeholder=""/>
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

@section('script')
    <script>
        $('#is_parent').change(function(e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            if(is_checked) {
                $('#parent_cat_div').addClass('d-none');
                $('#parent_cat_div').val('');
            }else{
                $('#parent_cat_div').removeClass('d-none');
            }
        })
    </script>
@endsection
