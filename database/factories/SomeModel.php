<?php

namespace Mbsoft31\LaravelReviews\Database\Factories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mbsoft31\LaravelReviews\Traits\HasReview;

class SomeModel extends Model
{
    use HasFactory;
    use HasReview;
}
