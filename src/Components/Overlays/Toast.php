<?php

/**
 * A toast: a transient message that is announced and that the document
 * keeps, because a message only a timer saw is not a message.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Overlays;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Toast extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $message,
        private readonly Tone $tone = Tone::Neutral,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/toast.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $message = $this->message;
        $tone = $this->tone;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
