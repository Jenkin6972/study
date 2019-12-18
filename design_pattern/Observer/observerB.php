<?php

namespace Observer;

class ObserverB extends Observer
{
    private $myState = 'init B';

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
        $this->subject->register($this);
    }

    public function update()
    {
        $this->myState = $this->subject->getState();
    }

    public function getSate()
    {
        return "ObserverB get state:".$this->myState;
    }
}