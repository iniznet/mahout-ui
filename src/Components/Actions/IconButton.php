<?php

/**
 * A button whose only content is an icon. The accessible name is the
 * required label — an icon button without one is unusable, so it cannot be
 * constructed without it.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Actions;

use Iniznet\Mahout\Render\ClassNameResolver;
use Iniznet\Mahout\Render\MarkupComponent;

final class IconButton extends MarkupComponent
{
    public function __construct(
        ClassNameResolver $classes,
        private readonly string $label,
        private readonly ButtonType $type = ButtonType::Button,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/icon-button.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $label = $this->label;
        $type = $this->type;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
