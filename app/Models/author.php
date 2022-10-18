<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nationality', 'email'];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'book_author');
        // return $this->hasMany(Book::class);
    }
}
