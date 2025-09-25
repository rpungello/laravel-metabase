<?php

namespace Rpungello\Metabase\Enums;

enum Display: string
{
    case Automatic = 'auto';
    case Link = 'link';
    case Email = 'email_link';
    case Image = 'image';
}
