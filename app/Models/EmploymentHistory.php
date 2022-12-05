<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmploymentHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employment_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'employment_status',
        'department_id',
        'position_id',
        'rank_id',
        'effective_date',
        'immediate_supervisor'
    ];

    public function employmentStatus(): HasMany
    {
        return $this->hasMany(EmploymentStatus::class, 'employment_status');
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'department_id');
    }

    public function position(): HasMany
    {
        return $this->hasMany(Position::class, 'position_id');
    }

    public function rank(): HasMany
    {
        return $this->hasMany(Rank::class, 'rank_id');
    }

    public function immediate_supervisor(): HasOne
    {
        return $this->hasOne(Employee::class, 'immediate_supervisor');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
