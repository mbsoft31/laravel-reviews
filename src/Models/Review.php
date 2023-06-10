<?php

namespace Mbsoft31\LaravelReviews\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use hasFactory;

    protected $fillable = ['user_id', 'reviewable_id', 'reviewable_type', 'rating', 'comment'];

    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('reviews.user_model'));
    }

}
