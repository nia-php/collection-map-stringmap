<?php
/*
 * This file is part of the nia framework architecture.
 *
 * (c) Patrick Ullmann <patrick.ullmann@nat-software.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);
namespace Nia\Collection\Map\StringMap;

use IteratorAggregate;
use OutOfBoundsException;

/**
 * Interface for all readable string map implementations.
 * String maps encapsulate a native php string assoc array and provides common methods.
 */
interface MapInterface extends IteratorAggregate
{

    /**
     * Checks whether the map contains a specific value by it's name.
     *
     * @param string $name
     *            Name of the value.
     * @return bool Returns 'true' if the requested value is contained, otherwise 'false' will be returned.
     */
    public function has(string $name): bool;

    /**
     * Returns a requested value by it's name. If the value is not contained in this map an exception will be thrown.
     *
     * @param string $name
     *            Name of the value.
     * @throws OutOfBoundsException If the value does not exist.
     * @return string The requested value.
     */
    public function get(string $name): string;

    /**
     * Tries to return a requested value. If the value is not contained in this map, the passed default value will be returned.
     *
     * @param string $name
     *            Name of the value.
     * @param string $default
     *            The used default value if the requested value could not be found.
     * @return string The requested value.
     */
    public function tryGet(string $name, string $default): string;
}
