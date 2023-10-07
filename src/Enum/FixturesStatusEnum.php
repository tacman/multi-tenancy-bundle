<?php

namespace FDS\MultiTenancyBundle\Enum;

enum FixturesStatusEnum: string
{
    case FIXTURES_CREATED = 'FIXTURES_CREATED';
    case FIXTURES_NOT_CREATED = 'FIXTURES_NOT_CREATED';
}
