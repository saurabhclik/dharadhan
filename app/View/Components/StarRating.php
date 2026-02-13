<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    public int|float $rating;
    public int $max;

    /**
     * Create a new component instance.
     */
    public function __construct($rating = 0, $max = 5)
    {
        $this->rating = $rating;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.star-rating');
    }
}
