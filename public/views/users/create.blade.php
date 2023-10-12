@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

        <div class="mt-3 text-right">
            <a href="/users" class="cursor-pointer text-gray-400 hover:text-white">Назад</a>
        </div>

        <div class="mt-8 w-full">
            <div class="text-center text-white mb-4">
                <h1 class="text-4xl">Новый пользователь</h1>
            </div>
            @if(!is_null(\Framework\Helpers\Session::get('errors')))
                <div class="max-w-md m-auto text-red-600 py-5">
                    @foreach(\Framework\Helpers\Session::get('errors') as  $error)
                        <p class="text-red-600">{{$error}}</p>
                    @endforeach
                </div>
                @php \Framework\Helpers\Session::remove('errors') @endphp
            @endif
            <form action="/users/store" method="post" class="max-w-md text-white m-auto border-white border rounded p-5">
                <div class="mb-5">
                    <input type="text" name="name" placeholder="Имя" required class="w-full py-1 px-2 rounded bg-gray-500">
                </div>
                <div class="mb-5">
                    <input type="email" name="email" placeholder="Email" required class="w-full py-1 px-2 rounded bg-gray-500">
                </div>
                <div class="">
                    <button class="bg-blue-600 text-white m-auto flex py-1 px-12 rounded">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
