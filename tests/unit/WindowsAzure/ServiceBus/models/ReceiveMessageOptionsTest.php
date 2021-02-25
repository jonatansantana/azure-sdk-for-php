<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace Tests\unit\AzureServiceBus\ServiceBus\models;

use AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class WrapAccessTokenResult.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class ReceiveMessageOptionsTest extends TestCase
{
    /**
     * @covers \AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions::__construct
     */
    public function testReceiveMessageOptionsConstructor()
    {
        // Setup

        // Test
        $receiveMessageOptions = new ReceiveMessageOptions();

        // Assert
        $this->assertNotNull($receiveMessageOptions);
    }

    /** 
     * @covers \AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions::getTimeout
     * @covers \AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions::setTimeout
     */
    public function testGetSetTimeout()
    {
        // Setup
        $expected = 'testTimeout';
        $receiveMessageOptions = new ReceiveMessageOptions();

        // Test
        $receiveMessageOptions->setTimeout($expected);
        $actual = $receiveMessageOptions->getTimeout();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /** 
     * @covers \AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions::getReceiveMode
     * @covers \AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions::setReceiveMode
     */
    public function testGetSetReceiveMode()
    {
        // Setup
        $expected = 'testReceiveMode';
        $receiveMessageOptions = new ReceiveMessageOptions();

        // Test
        $receiveMessageOptions->setReceiveMode($expected);
        $actual = $receiveMessageOptions->getReceiveMode();

        // Assert 
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
