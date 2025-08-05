<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>

    <div>
        <x-fieldset legend="About">
            <div class="flex gap-x-2 py-2">
                <x-fieldset legend="Name">
                    <p class="text-xl">{{ $user->name }}</p>
                </x-fieldset>
                <x-fieldset legend="Email">
                    <p class="text-xl">{{ $user->email }}</p>
                </x-fieldset>
            </div>
        </x-fieldset>

        <x-button :href="route('profile.edit')">Edit</x-button>
    </div>

    <x-fieldset legend="Stats">
        <ul>
            <li>Total tasks - {{ $user->tasks->count() }}</li>
            <li>Pending - {{ $user->tasks->where('status', 'pending')->count() }}</li>
            <li>In progress - {{ $user->tasks->where('status', 'in_progress')->count() }}</li>
            <li>Done - {{ $user->tasks->where('status', 'done')->count() }}</li>
        </ul>
    </x-fieldset>

    <x-button href="/tasks">Back</x-button>
</x-layout>
