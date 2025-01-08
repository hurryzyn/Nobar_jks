<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'events';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'photo',
        'price',

    ];
}
