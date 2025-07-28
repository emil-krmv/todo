<div class="border-dashed border-4 border-blue-200 p-3">
    <p class="text-xl">Task #{{ $task->id }}</p>
    <div class="px-2">
        <p class="truncate">{{ $task->title }}</p>
        <div class="">
            <p class="text-[16px]">Status: {{ $task->status }}</p>
            <p class="text-[16px]">User_id: {{ $task->user->id }}</p>
            <p class="text-[16px]">Priority: {{ $task->priority }}</p>
            <div class="flex gap-x-2">
                <x-button href="{{ route('tasks.show', $task) }}">Info</x-button>
                @if($task->status !== 'done')
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('patch')
                        <input
                            type="hidden"
                            name="status"
                            value="{{ $task->status === 'pending' ? 'in_progress' : 'done' }}"
                        >
                        <x-form.button>
                            {{ $task->status === 'pending' ? 'Start' : 'Done' }}
                        </x-form.button>
                    </form>
                @else
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-form.button>
                            Del
                        </x-form.button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
