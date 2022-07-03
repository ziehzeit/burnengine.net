<?php

namespace Ziehzeit\Burnengine\Model;

class Core
{
    /**
     * @param $a
     * @param $b
     * @return bool
     */
    public function assertSame($a, $b):bool
    {
     return ($a === $b);
    }
}