<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class book extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $fillable = ['book_title', 'book_author', 'book_description', 'book_image'];
    use SoftDeletes;

    public function author(): BelongsTo
    {
        return $this->belongsTo(author::class, 'book_author');
        // return $this->belongsTo(author::class);
    }
}
