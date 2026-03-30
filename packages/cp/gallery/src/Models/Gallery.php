<?php

namespace Cp\Gallery\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fi(): string
    {
        return $this->featured_image ?: 'not_found.png';
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class, 'gallery_id')
            ->where('active', 1)
            ->latest('id');
    }
}

