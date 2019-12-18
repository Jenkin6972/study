<?php

namespace Observer;

abstract class Observer
{
    protected $subject;

    public abstract function update();
}