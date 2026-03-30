<?php

namespace Cp\Team\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function fi()
    {
        return $this->profile_pic ?: 'not_found.png';
    }
    public function ficv()
    {
        return $this->cover_pic ?: 'not_found.png';
    }
}
