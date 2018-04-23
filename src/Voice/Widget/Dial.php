<?php

namespace Mobtexting\Voice\Widget;

use Mobtexting\Voice\Voice;

class Dial extends Voice
{
    public function __construct($to, $from = null)
    {
        if (\is_array($from)) {
            $attrib = $from;
            $attrib['to'] = $to;
        } else {
            $attrib = ['to' => $to, 'callerid' => $from];
        }
        parent::__construct("Dial", $attrib);
    }

    public function getDefaultAttributes()
    {
        return [
            "musiconhold" => "",
            "agentwelcome" => '',
            "timeout" => 30,
            "stickyagent" => false,
            "smartagent" => false,
            "retries" => 2
        ];
    }
}
