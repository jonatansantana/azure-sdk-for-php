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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\AzureServiceBus\Common;

use Tests\Framework\ServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use AzureServiceBus\Common\ServicesBuilder;

/**
 * Unit tests for class ServicesBuilder.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServicesBuilderTest extends ServiceRestProxyTestBase
{

    /**
     * @covers \AzureServiceBus\Common\ServicesBuilder::createServiceBusService
     * @covers \AzureServiceBus\Common\ServicesBuilder::createWrapService
     * @covers \AzureServiceBus\Common\ServicesBuilder::httpClient
     * @covers \AzureServiceBus\Common\ServicesBuilder::serializer
     */
    public function testBuildForServiceBus()
    {
        $this->skipIfEmulated();
        // Setup
        $builder = new ServicesBuilder();
        // Test
        $serviceBusRestProxy = $builder->createServiceBusService(TestResources::getServiceBusConnectionString());
        // Assert
        $this->assertInstanceOf('AzureServiceBus\ServiceBus\Internal\IServiceBus', $serviceBusRestProxy);
    }

    /**
     * @covers \AzureServiceBus\Common\ServicesBuilder::getInstance
     */
    public function testGetInstance()
    {
        // Test
        $actual = ServicesBuilder::getInstance();

        // Assert
        $this->assertInstanceOf('AzureServiceBus\Common\ServicesBuilder', $actual);
    }
}
