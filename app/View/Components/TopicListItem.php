<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicListItem extends Component
{
    public $topic_item;
    public $is_home;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topicItem, $isHome)
    {
        $this->topic_item = $topicItem;
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