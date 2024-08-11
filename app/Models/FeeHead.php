<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeHead extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function feeStructure()
    {
        return $this->hasMany(FeeStructure::class, 'feehead_id');
    }
}
