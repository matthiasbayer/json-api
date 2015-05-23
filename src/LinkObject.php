<?php

namespace Bayer\JsonApi;

trait LinkObject
{
    /**
     * @var array|null
     */
    protected $links;

    /**
     * @param string|null $name
     * @return array|null
     */
    public function getLinks($name = null)
    {
        if (null === $name) {
            return $this->links;
        }

        if (isset($this->links[$name])) {
            return $this->links[$name];
        }

        return null;
    }

    /**
     * @param array|null $links
     */
    public function setLinks(array $links)
    {
        if (null === $links) {
            $this->links = null;

            return;
        }

        foreach ($links as $name => $value) {
            $this->addLink($name, $value);
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function addLink($name, $value)
    {
        if (!in_array($name, array('self', 'related', 'prev', 'next', 'first', 'last'))) {
            throw new \InvalidArgumentException("Link name must be self, related, prev, next, first or last");
        }

        $this->links[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function removeLink($name)
    {
        if (isset($this->links[$name])) {
            $removed = $this->links[$name];
            unset($this->links[$name]);

            return $removed;
        }

        return null;
    }
}