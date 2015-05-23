<?php

namespace Bayer\JsonApi\Document;

use Bayer\JsonApi\Error;
use Bayer\JsonApi\LinkObject;
use Bayer\JsonApi\MetaObject;

/**
 * Class Document
 *
 * @link http://jsonapi.org/format/#document-structure
 * @package Bayer\JsonApi
 */
abstract class AbstractDocument
{
    use MetaObject;
    use LinkObject;

    /**
     * Related resources along with the requested primary resources
     *
     * @var array|null
     */
    protected $included;

    /**
     * @var Error[]|null
     */
    protected $errors;

    /**
     * @return array|null
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * @param array|null $included
     */
    public function setIncluded($included)
    {
        $this->included = $included;
    }

    /**
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param Error[]|null $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Remove all error objects
     */
    public function clearErrors()
    {
        $this->setErrors(null);
    }
}