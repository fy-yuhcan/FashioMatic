@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">ファッション提案結果</h1>

        <div class="text-center mb-8">
            <img src="{{ $image->url }}" alt="Uploaded Image" class="max-w-xs mx-auto rounded-lg shadow-lg">
        </div>

        @foreach ($recommendations as $recommendation)
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md mb-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">提案されたファッション</h2>
                <img src="{{ $recommendation->image_url }}" alt="Fashion Recommendation" class="max-w-xs mx-auto rounded-lg shadow-lg mb-4">
                <p class="text-gray-700 dark:text-gray-300 text-lg">{{ $recommendation->recommendation }}</p>
            </div>
        @endforeach
    </div>
@endsection

