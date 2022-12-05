<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'nickname',
        'dob',
        'gender',
        'religion',
        'email',
        'mobile',
        'civil_status',
        'name_of_spouse',
        'total_num_of_children',
        'blood_type',
        'date_hired',
        'position',
        'pagibig_no',
        'sss_no',
        'tin_no',
        'philhealth_no',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function employmentHistory(): HasMany
    {
        return $this->hasMany(EmploymentHistory::class);
    }
}
