@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

        <div class="mt-3 text-right">
            <a href="/notes/create" class="cursor-pointer text-gray-400 hover:text-white">Добавить</a>
        </div>

        <div class="w-full my-8">
            @foreach($notes as $note)
                <div class="max-w-md text-white p-2 my-6 m-auto w-full border border-white rounded justify-center">
                    <div class="flex items-center">
                        <div class="flex-1">
                            <p>{{$note->title}}</p>
                        </div>
                        <div class="text-sm flex gap-3">
                            <a href="/notes/{{$note->id}}/edit" class="cursor-pointer text-gray-400 hover:text-white">Обновить</a>
                            <button class="text-red-600">Удалить</button>
                        </div>
                    </div>
                    <div class="text-sm mt-2">
                        <p>{{$note->text}}</p>
                    </div>
                    <div class="text-sm mt-2 text-right">
                        <p>{{$note->created_at}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
