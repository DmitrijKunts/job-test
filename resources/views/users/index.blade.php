@extends('layout')

@section('content')
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
        Пользователи
    </h5>
    <a href="{{ route('users.create') }}"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Добавить пользователя
    </a>

    <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Имя
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Телефон
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ссылка
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Действия
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->phone }}
                        </td>
                        <td class="px-6 py-4">
                            <a target="_blank"
                                href="{{ route('home_link', $user) }}">{{ route('home_link', $user) }}</a>
                        </td>
                        <td class="px-6 py-4">

                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Править
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                    onsubmit="return confirm('Точно удалить?');">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Удалить
                                    </button>
                                </form>

                            </div>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection
