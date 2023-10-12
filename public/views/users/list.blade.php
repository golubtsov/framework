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
                <div class="max-w-md text-white p-4 my-6 m-auto w-full border border-white rounded justify-center">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <div class="text-sm flex flex-col gap-3">
                                <div class="flex-1 relative">
                                    @if(is_null($user->avatar))
                                        <img src="../../images/user-null.png" class="rounded-full" height="64" width="64">
                                    @else
                                        <img src="../../storage/{{$user->avatar}}" class="rounded-full border-2" height="64" width="64">
                                    @endif
                                    <span class="block absolute right-0 top-0">
                                        <a href="/users/{{$user->id}}/edit"
                                           class="cursor-pointer text-gray-400 hover:text-white">Обновить</a>
                                        <a href="/users/{{$user->id}}/delete" class="text-red-600">Удалить</a>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-1">Имя: {{$user->name}}</p>
                                    <p class="mb-1">Email: {{$user->email}}</p>
                                    <p class="mb-1">Статус: {{$user->status}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm mt-2 text-right">
                        <p>{{\Carbon\Carbon::parse($user->created_at)->locale('ru_RU')->diffForHumans()}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection