@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-8 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">ダッシュボード</h1>
        
        <h2 class="text-2xl font-semibold mb-4">提案されたファッション結果</h2>
        
        @if ($recommendations->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">まだファッション提案はありません。</p>
        @else
            <ul class="space-y-4">
                @foreach ($recommendations as $recommendation)
                    <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                        <a href="{{ route('fashion.results', ['image' => $recommendation->image_id]) }}" class="text-xl font-semibold text-indigo-500 hover:text-indigo-600">
                            {{ $recommendation->created_at->format('Y年m月d日 H:i:s') }} - 提案を見る
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
