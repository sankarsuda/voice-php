<?php

/**
 * 
 */

namespace Mobtexting\DialPlan\Voice;
use Mobtexting;
use Mobtexting\DialPlan\DialPlan;
class Answer extends DialPlan{
    public function __construct($delay=0){
        $delay_attr = new Mobtexting\DialPlan\BasicAttribute('delay', $delay, 'integer');
        parent::__construct("Answer", $delay_attr);
    }

    public function setDelay($delay){
        $this->setAttribute('delay', $delay);
    }

}