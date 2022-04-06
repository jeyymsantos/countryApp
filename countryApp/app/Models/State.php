<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class State extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'stateDesc',
        'countryId'
    ];

    public function country(){
        return $this->belongsTo('Country'); // Each of these state belongs country
    }
}
