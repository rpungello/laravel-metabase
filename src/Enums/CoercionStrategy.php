<?php

namespace Rpungello\Metabase\Enums;

enum CoercionStrategy: string
{
    case StringToFloat = 'Coercion/String->Float';
    case StringToInt = 'Coercion/String->Integer';
    case Iso8601ToTime = 'Coercion/ISO8601->Time';
    case Iso8601ToDate = 'Coercion/ISO8601->Date';
    case Iso8601ToDateTime = 'Coercion/ISO8601->DateTime';
}
