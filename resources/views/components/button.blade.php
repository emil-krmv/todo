@props(['href' => '#'])

<a
    href="{{ $href }}"
    class="bg-blue-100 px-3 py-1.5 inline-block leading-5"
>
    {{ $slot }}
</a>
