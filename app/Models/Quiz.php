<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    // Adicione os campos que podem ser preenchidos em massa
    protected $fillable = ['title', 'description'];
    public function questions()
{
    return $this->hasMany(Question::class);
}
}
