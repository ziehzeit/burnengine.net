<?php

namespace Ziehzeit\Burnengine\Controller\API;

use Exception;
use Ziehzeit\Burnengine\Extensions\Model\Parameter\UpdateValidator;
use Ziehzeit\Burnengine\Model\Dataset\Dataset;
use Ziehzeit\Burnengine\Model\Parameter\ParameterRegistry;
use Ziehzeit\Burnengine\Model\Parameter\Validator;

class APIBase
{
    protected Dataset $dataset;
    protected ParameterRegistry $parameterRegistry;
    protected Validator $validator;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->setParameterRegistry(new ParameterRegistry());
    }

    /**
     * @return void
     * @throws Exception
     */
    public function run():void
    {
        if (false === $this->isGetter($this)) {
            $validator = $this->getValidator();
            $validator->urlParameterCheck();

            $dataset = new Dataset();
            $dataset->setRawContent($_GET);
            $dataset->setUserIpAddress($_GET['ip']);
            $dataset->setUserMacAddress($_GET['mac']);
            $dataset->setUserType($_GET['ut']);
            $this->setDataset($dataset);
        }
    }

    /**
     * @param object $class
     * @return bool
     */
    public function isGetter(object $class):bool
    {
        return str_contains(get_class($class), 'Getter');
    }

    /**
     * @return Dataset
     */
    public function getDataset(): Dataset
    {
        return $this->dataset;
    }

    /**
     * @param Dataset $dataset
     */
    public function setDataset(Dataset $dataset): void
    {
        $this->dataset = $dataset;
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

    /**
     * @return Validator|UpdateValidator
     */
    public function getValidator(): Validator | UpdateValidator
    {
        return $this->validator;
    }

    /**
     * @param Validator $validator
     */
    public function setValidator(Validator $validator): void
    {
        $this->validator = $validator;
    }
}