<?php

/**
 * Golden files for component markup. A golden catches an accidental escaping
 * or structure change that a contains-style assertion would miss: the whole
 * document must match, byte for byte.
 *
 * Regenerate the fixtures after an intentional markup change:
 *
 *   GOLDEN_UPDATE=1 composer test
 *
 * A regenerated golden is a claim about real output and is reviewed like
 * any other change.
 */

declare(strict_types=1);

namespace Iniznet\Howdah\Tests\Unit;

use Iniznet\Mahout\Ui\ClassResolver;
use Iniznet\Mahout\Ui\Components\Actions\Button;
use Iniznet\Mahout\Ui\Components\Actions\ButtonType;
use Iniznet\Mahout\Ui\Components\Content\Accordion;
use Iniznet\Mahout\Ui\Components\Content\AccordionSection;
use Iniznet\Mahout\Ui\Components\Feedback\EmptyState;
use Iniznet\Mahout\Ui\Components\Forms\Input;
use Iniznet\Mahout\Ui\Components\Forms\InputType;
use Iniznet\Mahout\Ui\Components\Layout\Stack;
use Iniznet\Mahout\Ui\Components\Navigation\Breadcrumb;
use Iniznet\Mahout\Ui\Components\Navigation\Crumb;
use Iniznet\Mahout\Ui\Components\Primitives\Icon;
use PHPUnit\Framework\TestCase;

final class GoldenMarkupTest extends TestCase
{
    private ClassResolver $classes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->classes = ClassResolver::fromClassmapFile(dirname(__DIR__).'/fixtures/classmap-empty.json');
    }

    /** @return array<string, string> a document per component group */
    private static function documents(ClassResolver $classes): array
    {
        return [
            'layout-stack' => (new Stack($classes, ['<p>One</p>', '<p>Two</p>']))->render(),
            'navigation-breadcrumb' => (new Breadcrumb($classes, [
                new Crumb('Home', '/'),
                new Crumb('Fiction', '/fiction'),
                new Crumb('Harbor Lights'),
            ]))->render(),
            'actions-button' => (new Button($classes, 'Save', ButtonType::Submit))->render(),
            'forms-input' => (new Input($classes, 'howdah-email', 'email', 'Email', InputType::Email, 'me@example.com', true, true, 'howdah-email-help'))->render(),
            'feedback-empty' => (new EmptyState($classes, 'Nothing here yet', 'No chapters are published.'))->render(),
            'content-accordion' => (new Accordion($classes, [
                new AccordionSection('First', 'Body one', open: true),
                new AccordionSection('Second', 'Body two'),
            ]))->render(),
            'primitives-icon' => (new Icon($classes, 'search'))->render(),
        ];
    }

    public function testEveryGoldenMatchesTheRenderedMarkup(): void
    {
        $dir = dirname(__DIR__).'/fixtures/golden';
        $update = '1' === getenv('GOLDEN_UPDATE');

        $failures = [];
        foreach (self::documents($this->classes) as $name => $html) {
            $path = $dir.'/'.$name.'.html';

            if ($update) {
                file_put_contents($path, $html);
                continue;
            }

            self::assertFileExists($path, 'the golden for '.$name.' is missing.');

            $expected = (string) file_get_contents($path);
            if ($expected !== $html) {
                $failures[] = $name;
            }
        }

        self::assertSame([], $failures, "Golden files drifted from the rendered markup (regenerate deliberately with GOLDEN_UPDATE=1):\n".implode("\n", $failures));
    }
}
