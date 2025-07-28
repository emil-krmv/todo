<x-layout>
    <x-slot:title>
        Profile
    </x-slot:title>

    <h1>Your Profile</h1>
    <div>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <ul>
            <li>Total tasks - {{ $user->tasks->count() }}</li>
            <li>Pending - {{ $user->tasks->where('status', 'pending')->count() }}</li>
            <li>In progress - {{ $user->tasks->where('status', 'in_progress')->count() }}</li>
            <li>Done - {{ $user->tasks->where('status', 'done')->count() }}</li>
        </ul>
    </div>

    <x-button href="{{ route('profile.edit') }}">Edit</x-button>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        @method('delete')
        <x-form.button>
            Log Out
        </x-form.button>
    </form>

    <x-button href="/tasks">Back</x-button>
</x-layout>
