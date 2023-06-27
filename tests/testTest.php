<?php declare(strict_types=1);
namespace test;

include 'bootstrap.php';

use PHPUnit\Framework\TestCase;

final class Testtest extends TestCase
{
    public function testTest(): void
    {
        $x = new \zxyxy\Test();

        $this->assertSame(4, $x->add(2, 2));
    }
}
