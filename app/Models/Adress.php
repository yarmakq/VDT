<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $table = 'adress';

    protected $fillable = [
        'city',
        'street',
        'house',
        'num_apartment',
        'entrance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
