<?php

namespace Mobtexting\Voice\Tag;

use Mobtexting\Voice\Voice;

class Menu extends Voice
{
    protected $nested = [
        'wrongkey',
        'timeout',
        'onfail',
    ];

    public function __construct($prompt = null, $attribs = [])
    {
        if ($prompt) {
            if (is_array($prompt)) {
                $attribs = array_merge($prompt, $attribs);
            } else {
                $attribs['prompt'] = $prompt;
            }
        }

        parent::__construct("Menu", $attribs);

    }

    public function onFail($verb, $attribs = [])
    {
        return $this->setAttribute('onFail', $this->append($verb, $attribs), true);
    }

    public function onKeyPress($key, $verb, $attribs = [])
    {
        return $this->setAttribute($key, $this->append($verb, $attribs)->toArray(), true);
    }

    public function onTimeout($verb, $attribs = [])
    {
        return $this->setAttribute('timeout', $this->append($verb, $attribs), true);
    }

    public function getDefaultAttributes()
    {
        return [
            'waittime'        => 10,
            'maxrepeat'       => 3,
            'type'            => 'parallel',
            'dtmftimeout'     => 3,
            'dtmftdefaultkey' => '',
        ];
    }
}
