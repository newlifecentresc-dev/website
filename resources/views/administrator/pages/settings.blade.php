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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Settings</h5>
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

                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Application Settings</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('settings.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Website Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Title" name="site_title"
                                        value="{{ $setting->site_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keyword" placeholder="Meta Keyword"
                                        name="meta_keywords" value="{{ $setting->meta_keywords }}">
                                </div>

                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" rows="5"
                                        placeholder="Write some text..."
                                        name="meta_description">{{ $setting->meta_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="about_us">About Us</label>
                                    <textarea class="form-control" id="aboutus" rows="5"
                                        placeholder="Write some text..."
                                        name="about_us">{{ $setting->about_us }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="about_image">About Image</label>
                                    <div></div>
                                    <div class="form-group">
                                        <input type="file" accept="image/*" class="custom-select form-control mb-3" id="about_image"
                                            name="about_image" />
                                        <img src="{{ $setting->about_image }}" alt="{{ $setting->site_title }}" width="150">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Logo</label>
                                        <div></div>
                                        <div class="form-group">
                                            <input type="file" accept="image/*" class="custom-select form-control mb-3" id="site_logo"
                                                name="site_logo" />
                                            <img src="{{ $setting->site_logo }}" alt="{{ $setting->site_title }}" width="150">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Favicon</label>
                                        <div></div>
                                        <div class="form-group">
                                            <input type="file" accept="image/*" class="custom-select form-control mb-3" id="site_icon"
                                                name="site_icon" />
                                            <img src="{{ $setting->site_icon }}" alt="{{ $setting->site_title }}" width="30">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" placeholder="Address"
                                            name="site_address" value="{{ $setting->site_address }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">Email Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" placeholder="Email"
                                            name="site_email" value="{{ $setting->site_email }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="phone" placeholder="Phone"
                                            name="site_phone_number" value="{{ $setting->site_phone_number }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="fax">Alternative Phone Nnumber</label>
                                        <input type="text" class="form-control" id="fax" placeholder="Fax" name="site_alternative_phone_number"
                                            value="{{ $setting->site_alternative_phone_number }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="facebook_url">Facebook URL</label>
                                        <input type="text" class="form-control" id="facebook_url"
                                            placeholder="Facebook URL" name="facebook_url"
                                            value="{{ $setting->facebook_url }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="instagram_url">Instagram URL</label>
                                        <input type="text" class="form-control" id="instagram_url"
                                            placeholder="Instagram URL" name="instagram_url"
                                            value="{{ $setting->instagram_url }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="twitter_url">Twitter URL</label>
                                        <input type="text" class="form-control" id="twitter_url"
                                            placeholder="Twitter URL" name="twitter_url"
                                            value="{{ $setting->twitter_url }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="pinterest_url">Youtube URL</label>
                                        <input type="text" class="form-control" id="youtube_url"
                                            placeholder="Youtube URL" name="youtube_url"
                                            value="{{ $setting->youtube_url }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>

                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">Mail Configuration Settings</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('settings.mail.config') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_DRIVER">
                                    <label for="type">TYPE</label>
                                    <select name="MAIL_DRIVER" id="" class="form-control" onchange="checkMailDriver();">
                                        <option value="sendmail" {{ env('MAIL_DRIVER')=='sendmail' ? ' selected' : ''
                                            }}>
                                            SendMail
                                        </option>
                                        <option value="smtp" {{ env('MAIL_DRIVER')=='smtp' ? ' selected' : '' }}>
                                            SMTP
                                        </option>
                                        <option value="mailgun" {{ env('MAIL_DRIVER')=='mailgun' ? ' selected' : '' }}>
                                            Mailgun
                                        </option>
                                    </select>
                                </div>

                                <div id="smtp">
                                    <div class="form-group">
                                        <label for="">MAIL PORT</label>
                                        <input type="hidden" name="types[]" value="MAIL_PORT">
                                        <input type="text" class="form-control" name="MAIL_PORT"
                                            value="{{ env('MAIL_PORT') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">MAIL USERNAME</label>
                                        <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                        <input type="text" class="form-control" name="MAIL_USERNAME"
                                            value="{{ env('MAIL_USERNAME') }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="">MAIL PASSWORD</label>
                                        <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                        <input type="password" class="form-control" name="MAIL_PASSWORD"
                                            value="{{ env('MAIL_PASSWORD') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">MAIL ENCRYPTION</label>
                                        <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                        <input type="text" class="form-control" name="MAIL_ENCRYPTION"
                                            value="{{ env('MAIL_ENCRYPTION') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">MAIL FROM ADDRESS</label>
                                        <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                        <input type="text" class="form-control" name="MAIL_FROM_ADDRESS"
                                            value="{{ env('MAIL_FROM_ADDRESS') }}">
                                    </div>
                                </div>

                                <div id="mailgun">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="">MAILGUN DOMAIN</label>
                                            <input type="hidden" name="types[]" value="MAILGUN_DOMAIN">
                                            <input type="text" class="form-control" name="MAILGUN_DOMAIN"
                                                value="{{ env('MAILGUN_DOMAIN') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="">MAILGUN SECRET</label>
                                            <input type="hidden" name="types[]" value="MAILGUN_SECRET">
                                            <input type="text" class="form-control" name="MAILGUN_SECRET"
                                                value="{{ env('MAILGUN_SECRET') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    </div>
                                </div>
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
    $(document).ready(function() {
            checkMailDriver();
    });

        function checkMailDriver() {
            if ($('select[name=MAIL_DRIVER]').val() == 'mailgun') {
                $('#mailgun').show();
                $('#smtp').hide();
            } else {
                $('#mailgun').hide();
                $('#smtp').show();
            }
        }
</script>
@endsection
