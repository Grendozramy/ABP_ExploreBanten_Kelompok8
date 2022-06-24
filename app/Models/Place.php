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
        'title', 'title1', 'slug', 'user_id', 'category_id', 'excerpt','description', 'phone', 'website', 'office_hours', 'address', 'address1', 'longitude','latitude', 'location' 
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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * images
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany(PlaceImage::class, 'place_id', 'id');
    }

    // public function sliders()
    // {
    //     return $this->hasMany(Slider::class);
    // }
}
