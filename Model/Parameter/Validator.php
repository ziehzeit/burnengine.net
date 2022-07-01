<?php

namespace Ziehzeit\Burnengine\Model\Parameter;

use Exception;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;

#hier fehlt nen standardValidator
class Validator
{
    protected array $urlParameters;

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
        $parameterList = new ParameterRegistry();
        foreach ($parameterList->getParameterList() as $param){
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
}