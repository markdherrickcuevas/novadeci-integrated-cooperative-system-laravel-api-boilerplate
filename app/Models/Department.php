<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
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
        'head_name',
        'branch_code',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function branch(): HasOne
    {
        return $this->hasOne(Branch::class);
    }

    public function employmentHistory(): BelongsTo
    {
        return $this->belongsTo(EmploymentHistory::class, 'department_id');
    }
}
