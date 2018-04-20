<?php
require('../vendor/autoload.php');
//require('Mobtexting/DialPlan/BasicAttribute.php');
use Mobtexting\DialPlan\Voice\Answer;
use Mobtexting\DialPlan\Voice\Hangup;
$dial_plan  = new Answer( 10);
$dial_plan->append(new Hangup(16));
print_r($dial_plan->toJson());
?>