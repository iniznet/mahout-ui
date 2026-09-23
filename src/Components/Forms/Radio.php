<?php

/**
 * One radio button. Radios belong to a group by name; the group's semantics
 * come from the Fieldset that wraps it.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Forms;

use Iniznet\Mahout\Render\MarkupComponent;
use Iniznet\Mahout\Ui\ClassResolver;

final class Radio extends MarkupComponent
{
    public function __construct(
        ClassResolver $classes,
        private readonly string $id,
        private readonly string $name,
        private readonly string $value,
        private readonly string $label,
        private readonly bool $checked = false,
        private readonly ?string $describedBy = null,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/radio.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $id = $this->id;
        $name = $this->name;
        $inputValue = $this->value;
        $label = $this->label;
        $checked = $this->checked;
        $describedBy = $this->describedBy;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
