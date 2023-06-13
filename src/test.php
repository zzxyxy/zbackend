<?php
namespace zxyxy;

class Test
{
    public $pub;

    public function setPub($val)
    {
        $this->pub = $val;
    }

    public function add($x, $y)
    {
        return $x + $y;
    }
}
