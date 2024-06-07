<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FashionMatic - あなたのパーソナルファッションアシスタント</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .hero {
            background-image: url('{{ asset('images/top-image.webp') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            height: 100%;
        }
        .hero-content {
            height: 100%;
        }
        .content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            color: white;
        }
        .feature-box {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        .button-spacing {
            margin-bottom: 40px;
        }
        .feature-spacing {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 antialiased">
    <div class="hero relative flex items-center justify-center">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="hero-content relative z-10 text-center p-6 lg:p-8">
            <div class="content">
                <h1 class="text-5xl font-bold mb-4">FashionMaticへようこそ</h1>
                <p class="text-xl mb-8">あなたのパーソナルAIファッションアシスタント。服の画像をアップロードして、瞬時にパーソナライズされたファッション提案を受け取りましょう。</p>
                <div class="flex justify-center space-x-4 mb-8 button-spacing">
                    <a href="{{ route('fashion.upload') }}" class="px-6 py-3 bg-blue-500 rounded-lg shadow hover:bg-blue-600 transition">始める</a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-green-500 rounded-lg shadow hover:bg-green-600 transition">サインアップ</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 feature-spacing">
                    <div class="feature-box">
                        <h3 class="text-2xl font-semibold mb-4">服をアップロード</h3>
                        <p>服の画像をアップロードして、AIがそれらを分析し、最適なファッションコーディネートを提供します。</p>
                    </div>
                    <div class="feature-box">
                        <h3 class="text-2xl font-semibold mb-4">ファッション提案を受け取る</h3>
                        <p>最新のトレンドとあなたの個人的なスタイルに基づいたパーソナライズされたファッション提案を受け取ります。</p>
                    </div>
                    <div class="feature-box">
                        <h3 class="text-2xl font-semibold mb-4">お気に入りを保存</h3>
                        <p>お気に入りのコーディネートを保存し、いつでもダッシュボードからアクセスできます。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <p class="text-sm">&copy; 2024 FashionMatic. All rights reserved.</p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-gray-300">プライバシーポリシー</a>
                    <a href="#" class="hover:text-gray-300">利用規約</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>






