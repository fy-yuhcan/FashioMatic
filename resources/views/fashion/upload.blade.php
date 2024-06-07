@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white dark:bg-brown-200 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800 dark:text-gray-800">画像をアップロードしてファッションを提案する</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('fashion.recommend') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="form-group">
                <label for="image" class="block text-lg font-medium text-gray-700 dark:text-gray-600">画像ファイルを選択してください:</label>
                <input type="file" name="image" id="image" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required onchange="previewImage(event)">
            </div>
            <div id="image-preview" class="mt-4 text-center">
                <p class="text-gray-600 dark:text-gray-500">選択された画像がここに表示されます</p>
            </div>
            <div class="text-center">
                <button type="submit" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">ファッションを投稿する</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('image-preview');
                output.innerHTML = `<img src="${reader.result}" alt="Image Preview" class="max-w-xs mx-auto rounded-lg shadow-lg"/>`;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .dark\:bg-brown-200 {
            background-color: #efebe9;
        }
        .rounded-lg {
            border-radius: 0.5rem;
        }
        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .text-gray-800 {
            color: #2d3748;
        }
        .dark\:text-gray-800 {
            color: #2d3748;
        }
        .text-center {
            text-align: center;
        }
        .text-lg {
            font-size: 1.125rem;
        }
        .text-gray-700 {
            color: #4a5568;
        }
        .dark\:text-gray-600 {
            color: #718096;
        }
        .block {
            display: block;
        }
        .w-full {
            width: 100%;
        }
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .border {
            border-width: 1px;
        }
        .border-gray-300 {
            border-color: #d1d5db;
        }
        .rounded-md {
            border-radius: 0.375rem;
        }
        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .focus\:outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
        .focus\:ring-indigo-500 {
            --tw-ring-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.5);
        }
        .focus\:border-indigo-500 {
            border-color: #6366f1;
        }
        .sm\:text-sm {
            font-size: 0.875rem;
        }
        .mt-2 {
            margin-top: 0.5rem;
        }
        .mt-4 {
            margin-top: 1rem;
        }
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        .space-y-6 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
        }
        .inline-flex {
            display: inline-flex;
        }
        .items-center {
            align-items: center;
        }
        .text-base {
            font-size: 1rem;
        }
        .font-medium {
            font-weight: 500;
        }
        .rounded-md {
            border-radius: 0.375rem;
        }
        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .text-white {
            color: #ffffff;
        }
        .bg-blue-500 {
            background-color: #3b82f6;
        }
        .hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }
        .focus\:outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }
        .focus\:ring-2 {
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }
        .focus\:ring-offset-2 {
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }
    </style>
@endsection











