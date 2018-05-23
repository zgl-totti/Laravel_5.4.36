@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => '','color' => 'green'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
