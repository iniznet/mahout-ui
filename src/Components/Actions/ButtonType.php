<?php

/**
 * The native button types.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Actions;

enum ButtonType: string
{
    case Button = 'button';
    case Submit = 'submit';
    case Reset = 'reset';
}
