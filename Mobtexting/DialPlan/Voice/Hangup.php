<?php

/**
 * 
 */

namespace Mobtexting\DialPlan\Voice;
use Mobtexting\DialPlan\BasicAttribute;
use Mobtexting\DialPlan\DialPlan;
class Hangup extends DialPlan{
    public function __construct($reason=0){
        $delay_attr = new BasicAttribute('reason', $reason, 'integer');
        parent::__construct("Hangup", $delay_attr);
    }

    public function setReason($reason){
        $this->setAttribute('reason', $reason);
    }

}