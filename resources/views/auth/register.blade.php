<x-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="bg-blue-200">
            @if($errors)
                <small>{{$errors->first('name')}}</small>
            @endif
        </div>

        <div class="flex flex-col">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="bg-blue-200">
            @if($errors)
                <small>{{$errors->first('email')}}</small>
            @endif
        </div>

        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="bg-blue-200">
            @if($errors)
                <small>{{$errors->first('password')}}</small>
            @endif
        </div>

        <div class="flex flex-col">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="bg-blue-200">
        </div>

        <button>Sign In</button>
    </form>
    <p>
        Already have an account? ->
        <a href="{{ route('login') }}">Log In</a>
    </p>
</x-layout>
