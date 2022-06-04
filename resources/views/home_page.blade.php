@extends('layout')

@section('content')
    <div
        class="flex flex-col mx-auto  p-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Главная страница
        </h5>


        <div
            class="block p-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Моя ссылка
            </h5>
            <input readonly="" id="home_link" value={{ route('home_link', $user) }}
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <div class="mt-2 inline-flex rounded-md shadow-sm" role="group">
                <button onclick="copyLinkToBuffer()" type="button"
                    class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Копировать
                </button>
                <form method="POST" action="{{ route('home_link_regenerate', $user) }}">
                    @csrf
                    <button type="submit"
                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Генерировать
                    </button>
                </form>

                <form method="POST" action="{{ route('home_link_disable', $user) }}">
                    @csrf
                    <button type="submit"
                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Деактивировать
                    </button>
                </form>
            </div>

        </div>



        <div
            class="block p-6 max-w-3xl bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                Im feeling lucky
            </h5>

            <div class="mb-2 inline-flex rounded-md shadow-sm" role="group">


                <button onclick="luckyGen('{{ route('lucky.gen', $user) }}')" type="button"
                    class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    Im feeling lucky
                </button>

                <button onclick="luckyHistory('{{ route('lucky.history', $user) }}')" type="button"
                    class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                    History
                </button>
            </div>



            <ul
                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    Очков: <span id="points"></span>
                </li>
                <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                    Win/Lose: <span id="win_lose"></span>
                </li>
                <li class="w-full px-4 py-2 rounded-b-lg">
                    Сумма: <span id="win_summ"></span>
                </li>
            </ul>


            <div
                class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    История
                </h5>
                <p id="history" class="font-normal text-gray-700 dark:text-gray-400"> </p>
            </div>




        </div>


    </div>
@endsection
