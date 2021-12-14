<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}
