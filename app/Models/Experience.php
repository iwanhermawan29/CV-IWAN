<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    /** The associated table. */
    protected $table = 'experiences';

    /** Mass assignable attributes. */
    protected $fillable = [
        'user_id',
        'title',
        'company',
        'start_year',
        'end_year',
        'description',
        'order',
    ];

    /** Relation to User. */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
