<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\Models\Post;
use Illuminate\Support\Carbon;

class WeeklyPostsActions
{
    public function handler()
    {
        $now  =  Carbon::now();
        $start = $now->startOfWeek()->format('Y-m-d H:i:s');
        $end = $now->endOfWeek()->format('Y-m-d H:i:s');
        return Post::whereBetween('created_at', [$start, $end])->inRandomOrder()->limit(6)->get();
    }
}
