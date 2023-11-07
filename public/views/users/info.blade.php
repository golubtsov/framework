@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

        <div class="mt-3 text-right">
            <a href="/users" class="cursor-pointer text-gray-400 hover:text-white">Назад</a>
        </div>

        <div class="mt-8 w-full">
            <div class="text-center text-white mb-4">
                <h1 class="text-4xl">Иванов Иван</h1>
            </div>

            <div class="max-w-2xl text-white p-4 my-6 m-auto w-full rounded justify-center">
                <div class="flex items-center">
                    <div class="flex-1">
                        <div class="text-sm flex flex-col gap-3">
                            <div class="flex-1 relative">
                                <span class="block absolute right-0 top-0">
                                        <a href="/users/$user->id}}/edit"
                                           class="cursor-pointer text-gray-400 hover:text-white mr-3">Обновить</a>
                                        <a href="/users/$user->id}}/delete" class="text-red-600">Удалить</a>
                                    </span>
                            </div>
                            <div>
{{--                                <p class="mb-1">Имя: $user->name}}</p>--}}
                                <p class="mb-3 text-base">Email: test@test.com</p>
                                <p class="mb-3 text-base">Статус: Пользователь</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-sm mt-2 text-right">
{{--                    <p>{{\Carbon\Carbon::parse($user->created_at)->locale('ru_RU')->diffForHumans()}}</p>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
