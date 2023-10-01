@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')

{{--        @if(\Framework\Helpers\Session::have('errors'))--}}
{{--            <div class="flex max-w-md m-auto gap-4 p-5 flex-col flex-1 mb-5 text-white">--}}
{{--                @foreach(\Framework\Helpers\Session::get('errors') as $error)--}}
{{--                    <p>{{$error}}</p>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            @php \Framework\Helpers\Session::remove('errors') @endphp--}}
{{--        @else--}}

            <div class="w-full my-8">
                <div class="mt-3 text-right">
                    <a href="/" class="cursor-pointer text-gray-400 hover:text-white">Назад</a>
                </div>

                <div class="mt-8 w-full">
                    <form action="/dashboard/info" method="post" class="max-w-md m-auto border-white border rounded p-5">
                        <div class="mb-5">
                            <input type="text" name="name" placeholder="ФИО" required
                                   class="w-full py-1 px-2 rounded bg-gray-500"
                                   value="{{\Framework\Helpers\Auth::user()->name}}">
                        </div>
                        <div class="">
                            <button class="bg-blue-600 text-white m-auto flex py-1 px-12 rounded">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
