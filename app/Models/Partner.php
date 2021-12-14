<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['company', 'logo', 'address', 'website', 'phone'];

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function partnerType()
    {
        return $this->belongsTo(PartnerType::class);
    }

    public function states()
    {
        return $this->belongsToMany(State::class);
    }
}
