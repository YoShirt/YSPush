<?php

/*
 * This file is part of the YSPush package.
 *
 * (c) Arthur Edamov <edamov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YSPush\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use YSPush\InvalidPayloadException;
use YSPush\Payload;

class InvalidPayloadExceptionTest extends TestCase
{
    public function testReservedKey()
    {
        $exception = InvalidPayloadException::reservedKey();

        $this->assertTrue(is_a($exception, Exception::class));
        $this->assertStringContainsString(Payload::PAYLOAD_ROOT_KEY, $exception->getMessage());
    }

    public function testNotExistingCustomValue()
    {
        $key = "this is a string";

        $exception = InvalidPayloadException::notExistingCustomValue($key);

        $this->assertTrue(is_a($exception, Exception::class));
        $this->assertStringContainsString($key, $exception->getMessage());
    }
}
