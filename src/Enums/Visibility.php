<?php

namespace Rpungello\Metabase\Enums;

enum Visibility: string
{
    case Retired = 'retired';
    case Sensitive = 'sensitive';
    case Normal = 'normal';
    case Hidden = 'hidden';
    case DetailOnly = 'details-only';
}
