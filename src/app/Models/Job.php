<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listing';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'tags',
        'job_type',
        'is_remote',
        'requirements',
        'benefits',
        'address',
        'city',
        'state',
        'zip_code',
        'contact_email',
        'contact_phone',
        'company_name',
        'company_description',
        'company_logo',
        'company_website'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function bookmarkedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'job_user_bookmarks')->withTimestamps();
    }
}
