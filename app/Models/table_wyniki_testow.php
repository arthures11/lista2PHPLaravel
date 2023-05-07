<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_wyniki_testow extends Model
{
    protected $fillable = [
        'user_id',
        'tytul',
        'wynik',
        'test_id',
        'inprogress',
    ];
    public $table = 'table_wyniki_testow';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function test()
    {
        return $this->belongsTo(Tests::class);
    }
    use HasFactory;
}
