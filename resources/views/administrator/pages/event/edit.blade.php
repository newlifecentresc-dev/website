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
                        <form class="form" action="{{ route('events.update', $weeklyEvent->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Title</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $weeklyEvent->title }}" placeholder="" />
                                </div>

                                <div class="form-group">
                                    <label>Day</label>
                                    <div></div>
                                    <select class="custom-select form-control" name="day" id="day">
                                        <option value="Monday" {{ $weeklyEvent->day == 'Monday' ? ' selected' : ''
                                            }}>Monday</option>
                                        <option value="Tuesday" {{ $weeklyEvent->day == 'Tuesday' ? ' selected' : ''
                                            }}>Tuesday</option>
                                        <option value="Wednesday" {{ $weeklyEvent->day == 'Wednesday' ? ' selected' : ''
                                            }}>Wednesday</option>
                                        <option value="Thursday" {{ $weeklyEvent->day == 'Thursday' ? ' selected' : ''
                                            }}>Thursday</option>
                                        <option value="Friday" {{ $weeklyEvent->day == 'Friday' ? ' selected' : ''
                                            }}>Friday</option>
                                        <option value="Saturday" {{ $weeklyEvent->day == 'Saturday' ? ' selected' : ''
                                            }}>Saturday</option>
                                        <option value="Sunday" {{ $weeklyEvent->day == 'Sunday' ? ' selected' : ''
                                            }}>Sunday</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Time</label>
                                    <div></div>
                                    <input type="text" class="form-control" id="time" name="time"
                                        value="{{ $weeklyEvent->time }}" placeholder="" />
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
