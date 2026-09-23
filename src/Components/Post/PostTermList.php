<?php

/**
 * One term list: the taxonomy's terms as links. Empty renders nothing.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Post;

use Iniznet\Mahout\Content\PostTerm;
use Iniznet\Mahout\Render\ClassNameResolver;
use Iniznet\Mahout\Render\MarkupComponent;

final class PostTermList extends MarkupComponent
{
    /**
     * @param list<PostTerm> $terms
     */
    public function __construct(
        ClassNameResolver $classes,
        private readonly array $terms,
        private readonly string $label,
    ) {
        parent::__construct($classes);
    }

    #[\Override]
    protected function markupPath(): string
    {
        return __DIR__.'/markup/terms.php';
    }

    #[\Override]
    public function render(): string
    {
        \ob_start();
        $c = $this->classes();
        $terms = $this->terms;
        $label = $this->label;
        require $this->markupPath();

        return (string) \ob_get_clean();
    }
}
