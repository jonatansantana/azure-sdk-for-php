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

namespace Tests\Unit\AzureServiceBus\ServiceBus\Models;

use AzureServiceBus\ServiceBus\Internal\ActiveToken;
use AzureServiceBus\ServiceBus\Internal\WrapAccessTokenResult;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class ActiveToken.
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
class ActiveTokenTest extends TestCase
{
    /**
     * @covers \AzureServiceBus\ServiceBus\Internal\ActiveToken::__construct
     */
    public function testActiveTokenConstructor()
    {
        // Setup
        $wrapAccessTokenResult = new WrapAccessTokenResult();

        // Test
        $activeToken = new ActiveToken($wrapAccessTokenResult);

        // Assert
        $this->assertNotNull($activeToken);
    }

    /**
     * @covers \AzureServiceBus\ServiceBus\Internal\ActiveToken::getWrapAccessTokenResult
     * @covers \AzureServiceBus\ServiceBus\Internal\ActiveToken::setWrapAccessTokenResult
     */
    public function testActiveTokenGetSetWrapAccessTokenResult()
    {
        // Setup
        $expected = new WrapAccessTokenResult();

        // Test
        $activeToken = new ActiveToken($expected);
        $activeToken->setWrapAccessTokenResult($expected);
        $actual = $activeToken->getWrapAccessTokenResult();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }

    /**
     * @covers \AzureServiceBus\ServiceBus\Internal\ActiveToken::getExpirationDateTime
     * @covers \AzureServiceBus\ServiceBus\Internal\ActiveToken::setExpirationDateTime
     */
    public function testActiveTokenGetSetExpirationDateTimeResult()
    {
        // Setup
        $expected = new \DateTime();
        $wrapAccessTokenResult = new WrapAccessTokenResult();

        // Test
        $activeToken = new ActiveToken($wrapAccessTokenResult);
        $activeToken->setExpirationDateTime($expected);
        $actual = $activeToken->getExpirationDateTime();

        // Assert
        $this->assertEquals(
            $expected,
            $actual
        );
    }
}
