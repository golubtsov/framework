@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

        <div class="mt-3 text-right">
            <a href="/" class="cursor-pointer text-gray-400 hover:text-white">Назад</a>
        </div>

        <div class="mt-8 w-full">
            <form action="/notes/store" method="post" class="max-w-md m-auto border-white border rounded p-5">
                <div class="mb-5">
                    <input type="text" name="title" placeholder="Заголовок" required class="w-full py-1 px-2 rounded bg-gray-500">
                </div>
                <div class="mb-5">
                    <textarea name="text" placeholder="Содержание" required class="w-full py-1 px-2 rounded bg-gray-500"></textarea>
                </div>
                <div class="">
                    <button class="bg-blue-600 text-white m-auto flex py-1 px-12 rounded">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
