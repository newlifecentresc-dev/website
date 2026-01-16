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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Edit WeeklyEvent</h5>
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
                            <h3 class="card-title">Edit WeeklyEvent</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('events.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Title</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}" placeholder="title" />
                                </div>

                                <div class="form-group">
                                    <label>Day</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="day" id="day">
                                        <option value="">------Select Day--------</option>
                                        <option value="Monday" {{ old('day') == 'Monday' ? ' selected' : ''
                                            }}>Monday</option>
                                        <option value="Tuesday" {{ old('day') == 'Tuesday' ? ' selected' : ''
                                            }}>Tuesday</option>
                                        <option value="Wednesday" {{ old('day') == 'Wednesday' ? ' selected' : ''
                                            }}>Wednesday</option>
                                        <option value="Thursday" {{ old('day') == 'Thursday' ? ' selected' : ''
                                            }}>Thursday</option>
                                        <option value="Friday" {{ old('day') == 'Friday' ? ' selected' : ''
                                            }}>Friday</option>
                                        <option value="Saturday" {{ old('day') == 'Saturday' ? ' selected' : ''
                                            }}>Saturday</option>
                                        <option value="Sunday" {{ old('day') == 'Sunday' ? ' selected' : ''
                                            }}>Sunday</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Time</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="time" name="time"
                                        value="{{ old('time') }}" placeholder="00:00am" />
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
