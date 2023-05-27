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

use PHPUnit\Framework\TestCase;
use YSPush\Notification;
use YSPush\Payload;
use YSPush\Request;

class RequestTest extends TestCase
{
    public function testGetSandboxUri()
    {
        $request = new Request($this->createNotification(), $production = false);

        $this->assertEquals('https://api.development.push.apple.com/3/device/123', $request->getUri());
    }

    public function testGetProductionUri()
    {
        $request = new Request($this->createNotification(), $production = true);

        $this->assertEquals('https://api.push.apple.com/3/device/123', $request->getUri());
    }

    public function testGetBody()
    {
        $request = new Request($this->createNotification(), $production = false);

        $this->assertEquals('{"aps":{}}', $request->getBody());
    }

    public function testGetHeaders()
    {
        $request = new Request($this->createNotification(), $production = false);
        $request->addHeader('Connection', 'keep-alive');

        $this->assertEquals(['Connection' => 'keep-alive', 'apns-push-type' => 'alert'], $request->getHeaders());
    }

    public function testGetOptions()
    {
        $request = new Request($this->createNotification(), $production = false);
        $request->addOption('certificate_secret', 'secret');

        $this->assertArrayHasKey('certificate_secret', $request->getOptions());
    }

    private function createNotification()
    {
        return new Notification(Payload::create(), '123');
    }
}
