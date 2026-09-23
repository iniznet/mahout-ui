<?php

/**
 * An accordion: a list of native disclosure sections. One item may start
 * open; the browser owns the rest.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Content;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Accordion extends MarkupComponent
{
    /**
     * @param list<AccordionSection> $sections
     */
    public function __construct(
        ClassResolver $classes,
        private readonly array $sections,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/accordion.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $sections = $this->sections;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
