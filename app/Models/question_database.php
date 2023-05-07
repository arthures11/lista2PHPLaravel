<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_database extends Model
{
    public $table = 'question_database';
    protected $fillable = [
        'pytanie',
        'odp1',
        'odp2',
        'odp3',
        'prawidlowa',
    ];
    public function tests()
    {
        return $this->belongsToMany(Tests::class, 'tests_and_questiondatabase', 'test_id', 'pytanie_id');
    }
    use HasFactory;
}
