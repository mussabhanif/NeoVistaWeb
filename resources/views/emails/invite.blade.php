@component('mail::message')
# Hi there!

You've been invited to join NeoVista – a new and exciting chat experience. Join in to connect with friends, share moments, and stay in touch effortlessly.

@component('mail::button', ['url' => ''])
Download Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
