<?php

namespace App\Http\View\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class TagComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', Tag::orderBy('name')->pluck('name', 'id')->all());
    }
}
