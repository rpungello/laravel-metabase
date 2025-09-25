<?php

namespace Rpungello\Metabase\Enums;

enum NumberSeparator: string
{
    case American = '.,';
    case European = ',.';
    case None = '.';
    case Spaces = ', ';
    case Apostrophe = '.’';
}
