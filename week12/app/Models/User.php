<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    /**
     * Get the courses that this user (student) is enrolled in.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user')->withTimestamps();
    }
} 