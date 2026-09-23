<?php

/**
 * The document's skip link: the first focusable element, visible on focus.
 * The shell renders one; this component exists for surfaces that compose
 * their own landmark structure.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Actions;

use Iniznet\Mahout\Render\ClassNameResolver;
use Iniznet\Mahout\Render\MarkupComponent;

final class SkipLink extends MarkupComponent
{
    public function __construct(
        ClassNameResolver $classes,
        private readonly string $target,
        private readonly string $label,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/skip-link.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $target = $this->target;
        $label = $this->label;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
