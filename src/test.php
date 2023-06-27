<?php
namespace zxyxy;

class Test
{
    private \log\Logging $log;
    private mqtt\Imqtt $mqtt;

    public function __construct(\log\Logging $l, mqtt\Imqtt $mqtt)
    {
        $this->log = $l;
        $this->mqtt = $mqtt;
    }

    public function testlog($logit)
    {
        $this->log->info($logit);
    }

    public $pub;

    public function setPub($val)
    {
        $this->pub = $val;
    }

    public function add($x, $y)
    {
        return $x + $y;
    }

    public function send($topic, $msg)
    {
        $this->mqtt->send($topic, $msg);
    }
}
