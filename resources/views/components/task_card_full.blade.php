<div class="border-dashed border-4 border-blue-200 p-3">
    <p class="text-xl">Task #{{ $task->id }}</p>
    <div class="px-2">
        <p class="truncate">{{ $task->title }}</p>
        <div class="">
            <p class="text-[16px]">Status: {{ $task->status }}</p>
            <p class="text-[16px]">Priority: {{ $task->priority }}</p>
            <div class="flex gap-x-4">
                <x-button href="/tasks/{{ $task->id }}/edit">Edit</x-button>
                <form action="/tasks/{{ $task->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <x-form.button>Del</x-form.button>
                </form>
            </div>
        </div>
    </div>
</div>
