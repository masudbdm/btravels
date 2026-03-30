<?php

namespace Cp\ClientProject\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    Protected $fillable = [];



    public function fi()
    {
        return $this->image_name ?: 'not_found.png';
    }
}
