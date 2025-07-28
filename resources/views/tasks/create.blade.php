<x-layout>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="title">Title</label>
            <input id="title" type="text" class="bg-blue-200" name="title" value="{{ old('title') }}">
            @error('title')
                <small class="text-red-700">{{ $message }}</small>
            @enderror

        </div>

        <div class="flex flex-col">
            <label for="description">Description (optional)</label>
            <textarea id="description" name="description" class="bg-blue-200" cols="10" rows="5"></textarea>
        </div>


        <x-fieldset legend="Priority">
            <div>
                <input id="low" type="radio" class="bg-blue-200" name="priority" value="low" checked>
                <label for="low">Low</label>
            </div>

            <div>
                <input id="medium" type="radio" class="bg-blue-200" name="priority" value="medium">
                <label for="medium">Medium</label>
            </div>

            <div>
                <input id="high" type="radio" class="bg-blue-200" name="priority" value="high">
                <label for="high">High</label>
            </div>
        </x-fieldset>

        <div class="flex flex-col">
            <label for="due_date">Should be done until:</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date')
                <small class="text-red-700">{{ $message }}</small>
            @enderror
        </div>
        <button>Create</button>
    </form>
    <a href="/tasks">Back</a>
</x-layout>
