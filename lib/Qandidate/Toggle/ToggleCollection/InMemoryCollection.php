<?php

namespace Qandidate\Toggle\ToggleCollection;

use Qandidate\Toggle\Toggle;
use Qandidate\Toggle\ToggleCollection;

/**
 * In memory collection useful for testing or when toggles are loaded
 * "statically" from for example configuration.
 */
class InMemoryCollection extends ToggleCollection
{
    private $toggles = array();

    /**
     * {@inheritDoc}
     */
    public function all()
    {
        return $this->toggles;
    }

    /**
     * {@inheritDoc}
     */
    public function get($name)
    {
        if ( ! array_key_exists($name, $this->toggles)) {
            return null;
        }

        return $this->toggles[$name];
    }

    /**
     * {@inheritDoc}
     */
    public function set($name, Toggle $toggle)
    {
        $this->toggles[$name] = $toggle;
    }

    /**
     * {@inheritDoc}
     */
    public function remove($name)
    {
        if ( ! array_key_exists($name, $this->toggles)) {
            return false;
        }

        unset($this->toggles[$name]);

        return true;
    }
}
