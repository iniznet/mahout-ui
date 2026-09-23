<?php

/**
 * A control's error text. Like HelpText it carries the id
 * aria-describedby points at; the control sets aria-invalid itself.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Typography;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class ErrorText extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $id,
        private readonly string $message,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/error-text.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $id = $this->id;
        $message = $this->message;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
