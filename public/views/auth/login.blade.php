@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen py-52">
        @if(\Framework\Helpers\Session::have('errors'))
            <div class="flex max-w-md m-auto gap-4 p-5 flex-col flex-1 mb-5 rounded bg-red-500 text-white">
                @foreach(\Framework\Helpers\Session::get('errors') as $error)
                    <p>- {{$error}}</p>
                @endforeach
            </div>
            @php \Framework\Helpers\Session::remove('errors') @endphp
        @endif
        <form action="/login" method="post" class="flex max-w-md m-auto gap-4 p-5 flex-col flex-1 border rounded">
            <div>
                <label for="email">
                    <input type="email" name="email" placeholder="Email" required class="p-2 w-full rounded border bg-gray-500">
                </label>
            </div>
            <div>
                <label for="password">
                    <input type="password" name="password" placeholder="Пароль" required
                           class="p-2 w-full rounded border bg-gray-500">
                </label>
            </div>
            <div>
                <button class="bg-blue-600 text-white m-auto flex py-1 px-12 rounded">Войти</button>
            </div>

            <div class="text-center hover:cursor-pointer">
                <a href="/signup" class="text-white text-sm m-auto">Не зарегистрированы?</a>
            </div>
        </form>
    </div>
@endsection
