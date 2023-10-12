@extends('layouts.app')

@section('content')
    <div class="w-full flex-1 m-auto h-screen">
        @include('layouts.header')
        <div class="w-full my-8">
            <div class="mt-3 text-right">
                <a href="/" class="cursor-pointer text-gray-400 hover:text-white">Назад</a>
            </div>

            <div class="mt-8 w-full">
                <div class="text-center text-white mb-4">
                    <h1 class="text-4xl">Личные данные</h1>
                </div>
                @if(!is_null(\Framework\Helpers\Session::get('errors')))
                    <div class="max-w-md m-auto text-red-600 py-5">
                        @foreach(\Framework\Helpers\Session::get('errors') as  $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>
                    @php \Framework\Helpers\Session::remove('errors') @endphp
                @endif
                <form action="/dashboard/info" method="post"
                      class="max-w-md m-auto border-white border rounded p-5 text-white">
                    <div class="mb-5">
                        <label for="name" class="mr-1">ФИО</label>
                        <input type="text" id="name" name="name" placeholder="ФИО" required
                               class="w-full py-1 px-2 rounded bg-gray-500"
                               value="{{\Framework\Helpers\Auth::user()->name}}">
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mr-1">Email</label>
                        <input type="text" id="email" name="email" placeholder="Email" required
                               class="w-full py-1 px-2 rounded bg-gray-500"
                               value="{{\Framework\Helpers\Auth::user()->email}}">
                    </div>
                    <div class="mb-5">
                        <label for="status" class="mr-1">Статус</label>
                        <select name="status" id="status"
                                class="w-full py-1 px-2 rounded bg-gray-500">
                            <option value="1">У вас не статуса</option>
                            <option value="2">Статус 1</option>
                            <option value="3">Статус 2</option>
                        </select>
                    </div>
                    <div class="">
                        <button class="bg-blue-600 text-white m-auto flex py-1 px-12 rounded">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
