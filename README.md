# nia - string map component

String maps encapsulate a native php string assoc array and provides common methods.

## Installation

Require this package with Composer.

```bash
	composer require nia/collection-map-stringmap
```

## Tests
To run the unit test use the following command:

    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/

## How to use
The following sample shows you how to use the string map component and to decorate the map to a read-only map.

```php
	// create a read/write map.
	$map = new Map([
	    'foo' => '123',
	    'bar' => '456'
	]);

	// add 'baz' and remove 'bar'
	$map->set('baz', '789')->remove('bar');

	foreach ($map as $name => $value) {
	    var_dump($name, $value);
	}

	// make it read-only (ReadOnlyMap does not contain any methods to manipulate the map)
	$map = new ReadOnlyMap($map);

	foreach ($map as $name => $value) {
	    var_dump($name, $value);
	}
```
