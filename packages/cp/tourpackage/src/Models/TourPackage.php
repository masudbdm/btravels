<?php

namespace Cp\TourPackage\Models;

use Cp\Frontend\Models\ContactUs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    public function fi()
    {
        return $this->tour_package_image ?: 'not_found.png';
    }

    public function contacts()
    {
        return $this->hasMany(ContactUs::class);
    }
    
}
