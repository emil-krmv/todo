<x-mail::message>
# User Registered

Hello, {{ $name }}.<br>
You have created a new account!

<x-mail::panel>
Don't forget to verify your email address!
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
