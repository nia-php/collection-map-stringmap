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
namespace Test\Nia\Collection\Map\StringMap;

use PHPUnit_Framework_TestCase;
use Nia\Collection\Map\StringMap\Map;

/**
 * Unit test for \Nia\Collection\Map\StringMap\Map.
 */
class MapTest extends PHPUnit_Framework_TestCase
{

    private $map = null;

    protected function setUp()
    {
        $this->map = new Map([
            '123' => '123',
            '456',
            'foo' => '123',
            'bar' => '456'
        ]);
    }

    protected function tearDown()
    {
        $this->map = null;
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::has
     */
    public function testHas()
    {
        $this->assertSame(true, $this->map->has('123'));
        $this->assertSame(true, $this->map->has('124'));
        $this->assertSame(true, $this->map->has('foo'));
        $this->assertSame(true, $this->map->has('bar'));
        $this->assertSame(false, $this->map->has('baz'));
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::get
     */
    public function testGet()
    {
        $this->assertSame('123', $this->map->get('123'));
        $this->assertSame('456', $this->map->get('124'));
        $this->assertSame('123', $this->map->get('foo'));
        $this->assertSame('456', $this->map->get('bar'));
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::get
     */
    public function testGetException()
    {
        $this->setExpectedException(\OutOfBoundsException::class, 'Value "baz" is not set.');

        $this->map->get('baz');
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::tryGet
     */
    public function testTryGet()
    {
        $this->assertSame('123', $this->map->tryGet('123', 'bla'));
        $this->assertSame('456', $this->map->tryGet('124', 'bla'));
        $this->assertSame('123', $this->map->tryGet('foo', 'bla'));
        $this->assertSame('456', $this->map->tryGet('bar', 'bla'));
        $this->assertSame('bla', $this->map->tryGet('baz', 'bla'));
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::set
     */
    public function testSet()
    {
        $this->assertSame(false, $this->map->has('baz'));
        $this->assertSame($this->map, $this->map->set('baz', '789'));
        $this->assertSame(true, $this->map->has('baz'));
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::remove
     */
    public function testRemove()
    {
        $this->assertSame(true, $this->map->has('foo'));
        $this->assertSame($this->map, $this->map->remove('foo'));
        $this->assertSame(false, $this->map->has('foo'));
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::remove
     */
    public function testRemoveException()
    {
        $this->setExpectedException(\OutOfBoundsException::class, 'Value "baz" is not set.');

        $this->map->remove('baz');
    }

    /**
     * @covers \Nia\Collection\Map\StringMap\Map::getIterator
     */
    public function testGetIterator()
    {
        $values = [
            123 => '123',
            124 => '456',
            'foo' => '123',
            'bar' => '456'
        ];

        $this->assertInstanceOf(\Iterator::class, $this->map->getIterator());
        $this->assertSame($values, iterator_to_array($this->map->getIterator()));
    }
}
