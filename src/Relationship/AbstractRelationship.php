<?php

namespace Bayer\JsonApi\Relationship;

use Bayer\JsonApi\MetaTrait;
use Bayer\JsonApi\Link\LinkTrait;

/**
 * Class AbstractRelationship
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects-relationships
 * @package Bayer\JsonApi\Relationship
 */
abstract class AbstractRelationship
{
    use MetaTrait;
    use LinkTrait;

    /**
     * Get resource linkage
     */
    abstract public function getData();

    /**
     * Set resource linkage
     *
     * @param mixed $data
     */
    abstract public function setData($data);

    /**
     * Clear resource linkage
     */
    abstract public function clearData();
}