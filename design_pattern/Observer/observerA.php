<?php

namespace Observer;

class ObserverA extends Observer
{
    private $myState = 'init A';

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
        return "ObserverA get state:".$this->myState;
    }
}