<?php

namespace Bayer\JsonApi;

use Bayer\JsonApi\Resource\ResourceIdentifier;
use Bayer\JsonApi\Link\LinkTrait;

/**
 * Class Relationship
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects-relationships
 * @package Bayer\JsonApi
 */
class Relationship
{
    use MetaTrait;
    use LinkTrait;

    /**
     * @var ResourceIdentifier|ResourceIdentifier[]|null
     */
    protected $data;
}