<?php

declare(strict_types=1);

namespace Saturio\DuckDB\FFI;

use ReflectionClass;

class FindLibrary
{
    public static function headerPath(): string
    {
        return implode('/', [self::path(), 'duckdb-ffi.h']);
    }

    public static function libPath(): string
    {
        return implode(DIRECTORY_SEPARATOR, [self::path(), 'libduckdb.so']);
    }

    private static function path(): string
    {
        $thisClassReflection = new ReflectionClass(self::class);
        $path = dirname($thisClassReflection->getFileName());

        return implode(DIRECTORY_SEPARATOR, [$path, '..', '..', 'lib', "linux-amd64"]);
    }
}
