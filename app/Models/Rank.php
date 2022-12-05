<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'level',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function employmentHistory(): BelongsTo 
    {
        return $this->belongsTo(Employee::class, 'rank_id');
    }
}
