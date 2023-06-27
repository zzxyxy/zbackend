<?php

namespace zxyxy\mqtt;

interface Imqtt
{
    public function send($topic, $message);
}
