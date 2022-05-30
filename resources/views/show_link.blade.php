@extends('layout')

@section('content')
    <div
        class="mx-auto block p-6 max-w-max bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Ваша ссылка <a href="{{ route('home_link', $user) }}">{{ route('home_link', $user) }}</a>
        </h5>
    </div>
@endsection
