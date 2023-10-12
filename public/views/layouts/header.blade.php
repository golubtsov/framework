<header class="border-b border-white relative text-white py-5">
    <div class="absolute bottom-1">
        <ul class="flex">
            <li class="mr-3 hover:text-gray-400">
                <a href="/">Главная</a>
            </li>
            <li class="mr-3 hover:text-gray-400">
                <a href="/users">Пользователи</a>
            </li>
        </ul>
    </div>
    <ul class="flex content-end absolute right-0 text-right bottom-1">
        <li class="mr-5">
            <p>
                <a class="hover:text-gray-400" href="/users/{{\Framework\Helpers\Auth::user()->id}}/edit">{{\Framework\Helpers\Auth::user()->name}}</a>
            </p>
        </li>
        <li>
            <a href="/logout" class="hover:text-gray-400">Выйти</a>
        </li>
    </ul>
</header>