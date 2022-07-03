<?php

namespace Ziehzeit\Burnengine\Model\Parameter;

use Ziehzeit\Burnengine\Model\Core;

class ParameterRegistry extends Core
{
    protected array $parameterList;

    public function __construct()
    {
        $this->registerParameter('ip');
        $this->registerParameter('mac');
        $this->registerParameter('ut');
    }

    /**
     * @param string $parameter
     * @return void
     */
    public function registerParameter(string $parameter):void
    {
        $this->parameterList[] = $parameter;
    }

    /**
     * @return array
     */
    public function getParameterList(): array
    {
        return $this->parameterList;
    }

    /**
     * @param string $removeThis
     * @return array
     */
    public function removeParameter(string $removeThis):array
    {
        $counter = 0;
        $clearedList = [];

        foreach ($this->getParameterList() as $key => $value){
            if (false === $this->assertSame($key, $removeThis)){
                $clearedList[$key] = $value;
            }
            $counter++;
        }

        return $clearedList;
    }

    /**
     * @param array $parameterList
     */
    public function setParameterList(array $parameterList): void
    {
        $this->parameterList = $parameterList;
    }
}