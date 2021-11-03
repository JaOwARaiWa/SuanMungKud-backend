<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Work;

class Employee_Work extends Model
{
    use HasFactory;
    protected $table = 'employee_works';

    protected $fillable = [
        'work_id',
        'user_id',
        'is_finished',
        'date'
    ];

    public function user_id() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function work_id() {
        return $this->belongsTo(Work::class, 'work_id');
    }
}
