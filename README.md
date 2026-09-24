# mahout-ui

## What it is

The shared component library and the semantic class resolver. It owns the
typed presentation components every consumer composes from — actions,
navigation, typography, content primitives — each pairing a PHP class with one
markup file, and the `ClassResolver` that turns stable component names into
the consumer's class names. It owns no data access, no hooks and no styles.

## Installation

There is no Packagist lane. Consume the repository over VCS and pin the major:

```bash
composer require iniznet/mahout-ui:^1.0
```

A development checkout points at sibling directories through an uncommitted
`composer.dev.json` (path repositories plus `@dev`) and runs
`COMPOSER=composer.dev.json composer install`.

## The public surface

`src/Contracts/` and the documented public classes are the package's stable
API within a major. Everything under `src/Internal/` is `@internal`.

| Piece | Role |
|---|---|
| `ClassResolver` | resolves a stable component name to the consumer's class name; `$c('card')` in markup |
| `Components/Actions/*` | `Button`, `Link`, `IconButton`, `SkipLink`, with `ButtonType` and `ButtonVariant` |
| `Components/Navigation/*` | the site header and footer shells |
| `Components/Typography/*` | `Heading` and its level enum |
| `Components/Content/*` | `Card`, `Table`, `Accordion`, `Badge`, `Avatar`, `Figure`, `Disclosure`, `Tag`, `Tone` |
| `Components/Post/*` | post-body, post-meta and pagination presentation |

## Minimal usage

Resolve the class map once (a missing file resolves names to themselves, so a
consumer without a classmap still renders), then compose:

```php
use Iniznet\Mahout\Ui\ClassResolver;
use Iniznet\Mahout\Ui\Components\Typography\Heading;
use Iniznet\Mahout\Ui\Components\Typography\HeadingLevel;

$classes = ClassResolver::fromClassmapFile(
    get_theme_file_path('build/classmap.json'),
);

$heading = new Heading($classes, HeadingLevel::One, 'Hello');

echo $heading->render(); // <h1 class="howdah-heading">Hello</h1>
```

The class map is a JSON object mapping stable names to the consumer's class
names; the resolver falls back to the bare name for anything unmapped, so the
components are correct with no styling and become the consumer's as the map
grows.

## Writing a component against it

A component receives the resolver, renders typed props through one markup
file, and escapes exactly once per output. It fetches nothing, reads no
global and fires no hook — the same contract as a theme component, because a
theme component and a library component are the same shape at different
scopes.

## Compatibility

| Item | Value |
|---|---|
| PHP | 8.4 or later |
| WordPress | 7.1 or later (components are testable without it) |
| Licence | GPL-2.0-or-later |

The decisions this package made are recorded under `docs/decisions/`; the
discipline contract is `AGENTS.md`.

## Licence

GPL-2.0-or-later. The full text is in [LICENSE](./LICENSE).
