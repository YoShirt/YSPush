<?php

/*
 * This file is part of the YSPush package.
 *
 * (c) Arthur Edamov <edamov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YSPush;

use Exception;

/**
 * Class InvalidPayloadException
 * @package YSPush
 */
class InvalidPayloadException extends Exception
{
    public static function reservedKey(): self
    {
        return new static("Key " . Payload::PAYLOAD_ROOT_KEY . " is reserved and can't be used for custom property.");
    }

    public static function notExistingCustomValue(string $key): self
    {
        return new static("Custom value with key '$key' doesn't exist.");
    }
}
