<?php

/**
 * A modal dialog: the native element, so focus trapping, the initial focus
 * and the Escape key are the browser's behaviour and no script owns them.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Overlays;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Dialog extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $id,
        private readonly string $title,
        private readonly string $body,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/dialog.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $id = $this->id;
        $title = $this->title;
        $body = $this->body;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
