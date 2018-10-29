<?php
require __DIR__ . '/../vendor/autoload.php';

$response = new Mobtexting\Voice();
$response->answer();
$response->say('Hello');
// $filter = $response->filter([10]);
// $filter->onFail('hangup');
// $url = $filter->onPass('Url')->setUrl('google.com');
// $url->onResponse('*', 'hangup');
// $url->onResponse('x', 'hangup');

// $dial = $response->dial('700xxx', '80300xxxxx');
// $dial->setAttribute('retries', 1);

// $play = $dial->onAnswer('dial', ['9019955622', '789789']);
// $play->setAttribute('duration', 30);

//print_r($response->toArray());

function index($callerid = "+918724872702", $didnumber = "+918033753852")
{
    if (isset($_GET['clid'])) {
        $callerid = $_GET['clid'];
    }
    if (isset($_GET['uuid'])) {
        $didnumber = $_GET['uuid'];
    }
    $executive = "+918724872702";
    // Sunil Phone
    $supervisor = "+919435553388";
    // Ritik Sir
    $response = new Mobtexting\Voice();
    // any call should be transfered to an executive
    $executive_dial_widget = $response->dial($executive, $didnumber);
    $executive_dial_widget->setRetries(0);
    $executive_dial_widget->setAgentwelcome('Welcome to mobtexting executive.');

    // If call not answered by executive then should connect with supervisor
    $supervisor_dial_widget = $executive_dial_widget->onNoAnswer('dial', array($supervisor));
    $supervisor_dial_widget->setAttribute('callerid', $didnumber);
    $supervisor_dial_widget->setRetries(2);
    $supervisor_dial_widget->setAgentwelcome('Welcome to mobtexting supervisor.');

    $executive_dial_widget->append('play', ['welcome to world']);

    $call_flow             = array();
    $call_flow['Callflow'] = $response->toArray();

    // json data
    return json_encode($call_flow);
}

echo index();
