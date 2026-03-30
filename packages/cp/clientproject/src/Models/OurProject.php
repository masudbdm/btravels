<?php

namespace Cp\ClientProject\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProject extends Model
{
    use HasFactory;

    Protected $fillable = [];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id','id');
    }

    public function fi()
    {
        return $this->image_name ?: 'not_found.png';
    }
}