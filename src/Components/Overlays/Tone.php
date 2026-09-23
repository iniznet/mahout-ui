<?php

/**
 * The toast tones.
 */

declare(strict_types=1);

namespace Iniznet\Mahout\Ui\Components\Overlays;

enum Tone: string
{
    case Neutral = 'neutral';
    case Positive = 'positive';
    case Critical = 'critical';
}
