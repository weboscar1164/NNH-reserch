<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicHeaderItem extends Component
{
    public $topic_detail;
    public $topic_results;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topicDetail, $topicResults)
    {
        $this->topic_detail = $topicDetail;
        $this->topic_results = $topicResults;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.topic-header-item');
    }
}