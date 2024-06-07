<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fashion_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーとの関連付け
            $table->foreignId('image_id')->constrained('images')->onDelete('cascade'); // 画像との関連付け
            $table->text('recommendation'); // ファッション提案の内容
            $table->string('image_url', 2048); // URLを保存するカラムのサイズを2048に設定
            $table->timestamps(); // created_at および updated_at カラムを追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fashion_recommendations');
    }
};
