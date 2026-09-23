<?php

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Exception;

/**
 * The UI package's exception marker. Every exception this package throws
 * implements it, so a caller can catch the package as one thing.
 */
interface UiException extends \Throwable
{
}
