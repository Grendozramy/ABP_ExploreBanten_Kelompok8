<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Slider extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
         'user_id', 'title', 'title2',
     ];

    public function images()
    {
        return $this->hasMany(SliderImage::class, 'slider_id', 'id');
    }
}
