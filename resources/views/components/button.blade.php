@props(['href' => '#'])

<a
    href="{{ $href }}"
    class="bg-white px-3 py-1.5 inline-block leading-5 border-2"
>
    {{ $slot }}
</a>
