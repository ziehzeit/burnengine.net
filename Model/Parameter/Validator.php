<?php

namespace Ziehzeit\Burnengine\Model\Parameter;

use Exception;
use Ziehzeit\Burnengine\Model\Core;

#hier fehlt nen standardValidator
class Validator extends Core
{
    protected array $urlParameters;
    protected ParameterRegistry $parameterRegistry;

    /**
     * @throws Exception
     */
    public function __construct(array $urlParameters)
    {
        $this->setUrlParameters($urlParameters);
    }

    /**
     * @throws Exception
     */
    public function urlParameterCheck():bool
    {
        foreach ($this->getParameterRegistry()->getParameterList() as $param){
            if (false === in_array($param, array_keys($this->getUrlParameters()))){
                throw new Exception('MISSING KEY <u>'.$param.'</u>!');
            };
        }
        return true;
    }

    /**
     * @return array
     */
    public function getUrlParameters(): array
    {
        return $this->urlParameters;
    }

    /**
     * @param array $urlParameters
     */
    public function setUrlParameters(array $urlParameters): void
    {
        $this->urlParameters = $urlParameters;
    }

    /**
     * @return ParameterRegistry
     */
    public function getParameterRegistry(): ParameterRegistry
    {
        return $this->parameterRegistry;
    }

    /**
     * @param ParameterRegistry $parameterRegistry
     */
    public function setParameterRegistry(ParameterRegistry $parameterRegistry): void
    {
        $this->parameterRegistry = $parameterRegistry;
    }
}