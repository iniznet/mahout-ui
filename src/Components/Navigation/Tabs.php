<?php

/**
 * A tab list. The selected tab is marked aria-selected; activating a tab is
 * the client script's contract, so the markup carries the ids that script
 * wires up.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Navigation;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Tabs extends MarkupComponent
{
    /**
     * @param list<Tab> $tabs
     */
    public function __construct(
        ClassResolver $classes,
        private readonly array $tabs,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/tabs.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $tabs = $this->tabs;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
