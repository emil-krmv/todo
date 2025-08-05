<x-layout>
    @auth
        <div class="flex justify-between">
            <x-button href="{{ route('profile.show') }}">Profile</x-button>
            <x-button href="{{ route('tasks.create') }}">Create Task</x-button>
        </div>
    @endauth

    @guest
        <a href="{{ route('register') }}">Register</a>
    @endguest
    <form action="{{ route('tasks.index') }}" class="flex gap-x-3 items-center">

        <x-fieldset legend="Status">
            <div class="flex gap-x-1">
                <input type="checkbox" name="status[]" id="pending" value="pending" @checked(collect(request('status'))->contains('pending'))>
                <label for="pending">Pending</label>
            </div>

            <div class="flex gap-x-1">
                <input type="checkbox" name="status[]" id="in_progress" value="in_progress" @checked(collect(request('status'))->contains('in_progress'))>
                <label for="in_progress">In progress</label>
            </div>

            <div class="flex gap-x-1">
                <input type="checkbox" name="status[]" id="done" value="done" @checked(collect(request('status'))->contains('done'))>
                <label for="done">Done</label>
            </div>
        </x-fieldset>

        <x-fieldset legend="Priority">
            <div class="flex gap-x-1">
                <input type="checkbox" name="priority[]" id="low" value="low" @checked(collect(request('priority'))->contains('low'))>
                <label for="low">Low</label>
            </div>

            <div class="flex gap-x-1">
                <input type="checkbox" name="priority[]" id="medium" value="medium" @checked(collect(request('priority'))->contains('medium'))>
                <label for="medium">Medium</label>
            </div>

            <div class="flex gap-x-1">
                <input type="checkbox" name="priority[]" id="high" value="high" @checked(collect(request('priority'))->contains('high'))>
                <label for="high">High</label>
            </div>
        </x-fieldset>

        <div class="pt-1.5">
            <x-button :href="route('tasks.index')">Clear</x-button>
            <x-form.button>Filter</x-form.button>
        </div>
    </form>

    @if (session('notif'))
        <div class="bg-green-500 p-4 border-2">
            {{ session('notif') }}
        </div>
    @endif

    <div class="grid grid-cols-2 gap-3">
        @if($tasks->count() > 0)
            @foreach($tasks as $task)
                <x-task_card :$task />
            @endforeach
        @else
            <p>There are no tasks.</p>
        @endif
    </div>
</x-layout>
