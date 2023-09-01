# rockschtar/typed-arrays

# Description

 Primitive typed arrays and typed array abstraction for objects with type hints.

# Requirements

  - PHP 8.1+
  - [Composer](https://getcomposer.org/) to install

# Install

```
composer require rockschtar/typed-arrays
```

# Usage

### Build in typed arrays for primitives
Typed arrays for:
 - Integers
 - Floats
 - Strings
 - Numbers (float or int)

### Typed arrays for everything else

Create a typed array class 

```php
class DummyTypedArray extends TypedArray {
    /**
     * Overrides parent method for type hints
     * @return DummyClass
     */
    public function current() : DummyClass {
        return parent::current();
    }

    /**
     * Returns the type of the typed array
     * @return string
     */
    protected function getType(): string {
        return DummyClass::class;
    }
}
```

# License

rockschtar/typed-arrays is open source and released under MIT license. See LICENSE.md file for more info.

    
# Question? Issues?

rockschtar/typed-arrays is hosted on GitLab. Feel free to open issues there for suggestions, questions and real issues.
    