<?php

namespace Cp\Frontend\Models;

use Cp\TourPackage\Models\TourPackage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    public function package()
    {
        return $this->belongsTo(TourPackage::class, 'package_id');
    }
}
