<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    #[Scope]
    public function aboveFive($query)
    {
        return $query->where('rating', '>', 5);
    }
}
