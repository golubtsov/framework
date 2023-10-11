@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

        <div class="mt-3 text-right">
            <a href="/users/create" class="cursor-pointer text-gray-400 hover:text-white">Добавить</a>
        </div>

        <div class="w-full my-8">
            <div class="text-center text-white">
                <h1 class="text-4xl">Список пользователей</h1>
            </div>
            @foreach(array_reverse($users) as $user)
                <div class="max-w-md text-white p-2 my-6 m-auto w-full border border-white rounded justify-center">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <p>Имя: {{$user->name}}</p>
                            <p>Email: {{$user->email}}</p>
                        </div>
                        <div class="text-sm flex gap-3">
                            <a href="/users/{{$user->id}}/edit" class="cursor-pointer text-gray-400 hover:text-white">Обновить</a>
                            <a href="/users/{{$user->id}}/delete" class="text-red-600">Удалить</a>
                        </div>
                    </div>
                    <div class="text-sm mt-2 text-right">
                        <p>{{$user->created_at}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection