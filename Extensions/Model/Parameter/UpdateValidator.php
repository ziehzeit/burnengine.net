<?php

namespace Ziehzeit\Burnengine\Extensions\Model\Parameter;

use Ziehzeit\Burnengine\Extensions\Core\BurnExceptions;
use Ziehzeit\Burnengine\Model\Parameter\ParameterRegistry;
use Ziehzeit\Burnengine\Model\Parameter\Validator;

class UpdateValidator extends Validator
{
    protected string $token = 'Sxob6ll8hxsxoQseNy*g';

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
        $unCheckedToken = $this->getUrlParameters()['token'];

        if (preg_match_all('|^[a-zA-Z\d/#*+!§,()=:.@äöüÄÖÜß_\-]{20}$|', $unCheckedToken) and $this->assertSame($unCheckedToken, $this->getToken())){
            return true;
        }else{
            throw new BurnExceptions('Token incorrect! ');
        }
    }

    /**
     * @return string
     */
    private function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    private function setToken(string $token): void
    {
        $this->token = $token;
    }
}