<?php

namespace FS\MultiTenancyBundle\Enum;

enum MigrationStatusEnum: string
{
    case MIGRATION_CREATED = 'MIGRATION_CREATED';
    case MIGRATION_NOT_CREATED = 'MIGRATION_NOT_CREATED';
}
