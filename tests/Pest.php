<?php declare(strict_types=1);

use Dotenv\Dotenv;
use Rat\eBaySDK\Tests\TestCase;

if (file_exists(__DIR__ . '/../.env')) {
    Dotenv::createImmutable(dirname(__DIR__))->safeLoad();
}

uses(TestCase::class)->in(__DIR__);
