<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'academic_year_id',
        'feehead_id',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december',
        'january',
        'february',
        'march'
    ];

    public function FeeHead()
    {
        return $this->belongsTo(FeeHead::class, 'feehead_id');
    }

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function Classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
