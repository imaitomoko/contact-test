<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'gender',
        'email',
        'zip11',
        'addr11',
        'building',
        'opinion',
    ];

    public static $rules = array(
        'last_name' => 'required',
        'first_name' => 'required',
        'email' => ['required', 'email'],
        'zip11' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/'],
        'building' => 'nullable',
        'opinion' => ['required', 'max:120'],
    );

    
}
