<?php

namespace Observer;

class Subject
{
    private $state;

    private $observers = [];

    public function getState()
    {
        return $this->state;
    }

    public function seState($state)
    {
        $this->state = $state;
        $this->notifyAllObjects();
    }

    public function register(Observer $object)
    {
        $this->observers[] = $object;
    }

    public function remove($object)
    {
        foreach ($this->observers as $key => $observer) {
            if ($observer == $object){
                unset($this->observers[$key]);
            }
        }
    }

    public function notifyAllObjects()
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}