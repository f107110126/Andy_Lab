{{-- this is generate by command: --}}
{{-- php artisan make:mail Contact2 --markdown=emails.markdown2 --}}
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
