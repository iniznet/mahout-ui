<?php

/**
 * A spinner. It is decorative: the surrounding loading state carries the
 * text, so the spinner itself is aria-hidden.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Feedback;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Spinner extends MarkupComponent
{
    public function __construct(ClassResolver $classes)
    {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/spinner.php';
    }
}
