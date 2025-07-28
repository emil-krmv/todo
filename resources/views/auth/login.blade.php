<x-layout>
    <form action="{{ route('login') }}" method="POST">
        @csrf

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

        <button>Log In</button>
    </form>
    <p>
        Don't have an account? ->
        <a href="{{ route('register') }}">Sign In</a>
    </p>
</x-layout>
