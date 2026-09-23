<?php

/**
 * A term tag: a link to the term's archive.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Content;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Tag extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $label,
        private readonly string $href,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/tag.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $label = $this->label;
        $href = $this->href;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
