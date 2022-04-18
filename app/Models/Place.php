<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'user_id', 'category_id', 'excerpt','description', 'phone', 'website', 'office_hours', 'address', 'longitude','latitude', 'location'
    ];

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * images
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(PlaceImage::class);
    }

    // public function sliders()
    // {
    //     return $this->hasMany(Slider::class);
    // }
}
