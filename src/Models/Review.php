<?php

namespace Mbsoft31\LaravelReviews\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

/**
 * @method static create(array $array)
 * @method static where(string $string, int $getUserId)
 * @method static find(int $getId)
 * @property int|mixed $rating
 * @property mixed|string $comment
 * @property mixed|string $reviewable_type
 * @property int|mixed $reviewable_id
 * @property int|mixed $user_id
 * @property mixed $id
 */
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

    public static function fromRatingEntity(\App\Domain\Entities\Review $review): self
    {
        $reviewModel = new self();
        $reviewModel->rating = $review->getRating()->getValue();
        $reviewModel->comment = $review->getComment()->getValue();
        $reviewModel->user_id = $review->getUserId();
        $reviewModel->reviewable_id = $review->getReviewableId();
        $reviewModel->reviewable_type = $review->getReviewableType();
        return $reviewModel;
    }

}
