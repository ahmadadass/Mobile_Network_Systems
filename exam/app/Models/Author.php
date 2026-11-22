<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'birth_year',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
