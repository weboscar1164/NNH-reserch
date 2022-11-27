<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicListItem extends Component
{
    public $topic;
    public $is_home;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topic, $isHome)
    {
        $this->topic = $topic;
        $this->is_home = $isHome;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topic-list-item');
    }
}