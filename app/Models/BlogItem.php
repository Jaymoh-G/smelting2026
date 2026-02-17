<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Sluggable\HasSlug;
// use Spatie\Sluggable\SlugOptions;

class BlogItem extends Model
{
    use HasFactory;
    // use HasSlug;
    protected $guarded = [
        'id'
    ];

    /* public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    } */

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    /* public function getRouteKeyName()
    {
        return 'slug';
    } */

}
