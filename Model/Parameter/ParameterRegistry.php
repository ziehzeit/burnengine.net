<?php

namespace Ziehzeit\Burnengine\Model\Parameter;

class ParameterRegistry
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
}