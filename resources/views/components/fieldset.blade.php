@props(['legend' => 'Legend'])

<fieldset class="flex gap-x-3 border-2 px-3 pb-1.5 w-fit">
    <legend class="px-1.5 leading-4.5">
        {{ $legend }}
    </legend>

    {{ $slot }}
</fieldset>
