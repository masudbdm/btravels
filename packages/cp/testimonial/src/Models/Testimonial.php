<?php

namespace Cp\Testimonial\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public function fi()
    {
        return $this->image ?: 'not_found.png';
    }
}
