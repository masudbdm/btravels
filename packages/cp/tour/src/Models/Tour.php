<?php

namespace Cp\Tour\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
     public function fi()
    {
        return $this->featured_image ?: 'not_found.png';
    }
}
