<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tudolist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'name', 'text'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tudolist()
    {
        return $this->belongsTo(User::class);
    }
}
