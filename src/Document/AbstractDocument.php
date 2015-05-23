<?php

namespace Bayer\JsonApi\Document;

use Bayer\JsonApi\Error;
use Bayer\JsonApi\Link\LinkTrait;
use Bayer\JsonApi\MetaTrait;
use Bayer\JsonApi\Resource\ResourceObject;

/**
 * Class Document
 *
 * @link http://jsonapi.org/format/#document-structure
 * @package Bayer\JsonApi
 */
abstract class AbstractDocument
{
    use MetaTrait;
    use LinkTrait;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * Related resources along with the requested primary resources
     *
     * @var ResourceObject[]|null
     */
    protected $included;

    /**
     * @var Error[]|null
     */
    protected $errors;

    /**
     * @return ResourceObject[]|null
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * @param ResourceObject[]|null $included
     */
    public function setIncluded(array $included = null)
    {
        $this->included = null;

        foreach ($included as $resource) {
            $this->addIncluded($resource);
        }
    }

    /**
     * @param ResourceObject $included
     */
    public function addIncluded(ResourceObject $included)
    {
        if (!is_array($this->included)) {
            $this->included = array();
        }

        $this->included[] = $included;
    }

    /**
     * @param ResourceObject $included
     * @return bool
     */
    public function hasIncluded(ResourceObject $included)
    {
        return in_array($included, $this->included);
    }

    /**
     * @param ResourceObject $included
     * @return bool
     */
    public function removeIncluded(ResourceObject $included)
    {
        $key = array_search($included, $this->included, true);

        if ($key !== false) {
            unset($this->included[$key]);

            return true;
        }

        return false;
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

    /**
     * Get primary data
     *
     * @return mixed
     */
    abstract public function getData();

    /**
     * Set primary data
     *
     * @param $data
     */
    abstract public function setData($data);

    /**
     * Clear primary data
     */
    abstract public function clearData();
}