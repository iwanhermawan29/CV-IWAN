<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'user_id',
        'degree',
        'institution',
        'start_year',
        'end_year',
        'description',
        'order',
    ];

    /**
     * Get the user that owns the education entry.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
