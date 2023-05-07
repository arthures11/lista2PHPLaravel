<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    public $table = 'tests';
    protected $fillable = [
        'title',
    ];
    public function questions()
    {
        return $this->belongsToMany(question_database::class, 'tests_and_questiondatabase', 'test_id', 'pytanie_id');
    }
    use HasFactory;
}
