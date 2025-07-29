@props(['legend' => 'Legend'])

<fieldset class="flex gap-x-3 border-2 px-3 pb-1.5 w-fit bg-blue-100">
    <legend class="px-1.5 leading-4.5 text-xl bg-blue-100 border-2">
        {{ $legend }}
    </legend>

    {{ $slot }}
</fieldset>
