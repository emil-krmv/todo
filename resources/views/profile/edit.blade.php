<x-layout>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')

        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}">
            @error('name')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <div class="flex flex-col">
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email', $user->email ?? '') }}">
            @error('email')
                <small>{{ $message }}</small>
            @enderror
        </div>

        <x-form.button>
            Save
        </x-form.button>
    </form>

    <x-button href="{{ route('profile.show') }}">
        Back
    </x-button>
</x-layout>
