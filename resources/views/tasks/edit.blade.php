<x-layout>
    <a href="/tasks">Back</a>
    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" class="bg-blue-200" name="title" value="{{ $task->title }}">
        <button>Save</button>
    </form>
</x-layout>
