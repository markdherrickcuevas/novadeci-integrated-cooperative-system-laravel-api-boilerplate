<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function employmentHistory(): BelongsTo
    {
        return $this->belongsTo(EmploymentHistory::class, 'position_id');
    }
}
