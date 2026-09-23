<?php

/**
 * One accordion section.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Content;

final readonly class AccordionSection
{
    public function __construct(
        public string $summary,
        public string $body,
        public bool $open = false,
    ) {
    }
}
