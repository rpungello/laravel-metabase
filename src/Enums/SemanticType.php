<?php

namespace Rpungello\Metabase\Enums;

enum SemanticType: string
{
    case PrimaryKey = 'type/PK';
    case ForeignKey = 'type/FK';
    case Category = 'type/Category';
    case Name = 'type/Name';
    case City = 'type/City';
    case State = 'type/State';
    case Country = 'type/Country';
    case PostalCode = 'type/ZipCode';
    case Description = 'type/Description';
    case Title = 'type/Title';
    case Email = 'type/Email';
    case AvatarUrl = 'type/AvatarURL';
    case ImageUrl = 'type/ImageURL';
    case Url = 'type/URL';
}
