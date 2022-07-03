<?php

namespace Ziehzeit\Burnengine\Extensions\Model\Parameter;

use Ziehzeit\Burnengine\Extensions\Core\BurnExceptions;
use Ziehzeit\Burnengine\Model\Parameter\ParameterRegistry;
use Ziehzeit\Burnengine\Model\Parameter\Validator;

class UpdateValidator extends Validator
{
    public function __construct(array $urlParameters)
    {
        $parameterRegistry = new ParameterRegistry();
        $parameterRegistry->registerParameter('token');

        $this->setParameterRegistry($parameterRegistry);

        parent::__construct($urlParameters);
    }

    /**
     * @return bool|int
     * @throws BurnExceptions
     */
    public function correctPass(): bool|int
    {
        $token = $this->getUrlParameters()['token'];

        if ($token){
            return preg_match('|^[a-zA-Z\d/#*+!§,()=:.@äöüÄÖÜß_\-]{20}$|', $this->getUrlParameters()['token']);
        }else{
            throw new BurnExceptions('No token given! ');
        }
    }
}