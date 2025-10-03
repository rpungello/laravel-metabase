<?php

namespace Rpungello\Metabase\Enums;

enum Engine: string
{
    case Postgres = 'postgres';
    case Mysql = 'mysql';
    case Sqlite = 'sqlite';
    case Microsoft = 'sqlserver';
    case Oracle = 'oracle';
    case MongoDb = 'mongo';
    case Redshift = 'redshift';
    case Snowflake = 'snowflake';
    case BigQuery = 'bigquery';
}
