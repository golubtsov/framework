<header class="border-b border-white relative text-white py-5">
    <ul class="flex content-end absolute right-0 text-right bottom-1">
        <li class="mr-5">
            <p>
                <a class="hover:text-gray-400" href="/dashboard">{{\Framework\Helpers\Auth::user()->name}}</a>
            </p>
        </li>
        <li>
            <a href="/logout" class="hover:text-gray-400">Выйти</a>
        </li>
    </ul>
</header>