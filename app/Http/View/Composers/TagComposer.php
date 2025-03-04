<?php

namespace App\Http\View\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer
{
    public function compose(View $view): void
    {
        $view->with('tags', Tag::orderBy('name')->get());
    }
}
