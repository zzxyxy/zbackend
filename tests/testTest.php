<?php declare(strict_types=1);
namespace test;

include 'bootstrap.php';

use PHPUnit\Framework\TestCase;

final class Testtest extends TestCase
{
    public function testTest(): void
    {
        $this->assertSame(4, 2+2);
    }
}
