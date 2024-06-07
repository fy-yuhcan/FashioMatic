<?php

// app/Models/FashionRecommendation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionRecommendation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image_id', 'recommendation','image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}

