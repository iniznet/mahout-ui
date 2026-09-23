<?php

/**
 * The container widths. Reading is narrow, structure is wide.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Layout;

enum Width: string
{
    case Reading = 'reading';
    case Wide = 'wide';
}
