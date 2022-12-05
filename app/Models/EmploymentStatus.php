<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmploymentStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employment_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function employmentHistory(): BelongsTo
    {
        return $this->belongsTo(EmploymentHistory::class, 'employment_status');
    }
}
