<?php

/**
 * One navigation entry.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Navigation;

final readonly class NavItem
{
    public function __construct(
        public string $label,
        public string $href,
        public bool $current = false,
    ) {
    }
}
