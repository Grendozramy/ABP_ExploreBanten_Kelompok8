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
         'user_id', 'image', 'title', 'title2',
     ];

     /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/sliders/' . $image);
    }

    // public function places()
    // {
    //     return $this->belongsTo(Place::class);
    // }
}
