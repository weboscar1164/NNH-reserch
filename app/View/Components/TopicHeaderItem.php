<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TopicHeaderItem extends Component
{
    public $topic_detail;
    public $topic_results;
    public $data_choice;
    public $data_answer;
    public $is_answerd;
    public $likes_results;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($topicDetail, $topicResults, $dataChoice, $dataAnswer, $isAnswerd, $likesResults)
    {
        $this->topic_detail = $topicDetail;
        $this->topic_results = $topicResults;
        $this->data_choice = $dataChoice;
        $this->data_answer = $dataAnswer;
        $this->is_answerd = $isAnswerd;
        $this->likes_results = $likesResults;
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