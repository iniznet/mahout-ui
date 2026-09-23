<?php

/**
 * The site footer: a colophon slot and the year. The year is rendered from
 * the current time, not from a stored value, so it cannot go stale.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Navigation;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class SiteFooter extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $colophon = '',
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/site-footer.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $colophon = $this->colophon;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
