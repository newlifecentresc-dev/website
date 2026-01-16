@component('mail::message')
# {{ $data['subject'] }}

{!! $data['message'] !!}.

Thanks,<br>
{{ $settings->site_title }}
@endcomponent
