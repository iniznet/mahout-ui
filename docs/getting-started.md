# Getting started

## Install

```bash
composer require iniznet/mahout-ui:^1.0
```

Requires PHP 8.4. Components are testable without WordPress.

## Render your first component

```php
use Iniznet\Mahout\Ui\ClassResolver;
use Iniznet\Mahout\Ui\Components\Typography\Heading;
use Iniznet\Mahout\Ui\Components\Typography\HeadingLevel;

$classes = ClassResolver::fromClassmapFile(
    get_theme_file_path('build/classmap.json'),
);

echo (new Heading($classes, HeadingLevel::One, 'Hello'))->render();
```

A missing classmap file is not an error: the resolver falls back to bare
names, so the markup is correct unstyled and becomes the consumer's as the map
grows. The class map is a JSON object of stable component name to class name.

## Failure modes

| Symptom | Cause |
|---|---|
| `ClassMapMalformed` | the classmap file exists but is not a JSON object of string-to-string entries |
| A component renders bare names | the classmap does not cover the component's names — expected, and why the resolver exists |
