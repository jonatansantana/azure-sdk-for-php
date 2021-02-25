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

namespace Tests\unit\AzureServiceBus\Common\Internal;

use AzureServiceBus\Common\Internal\ServiceBusSettings;
use AzureServiceBus\Common\Internal\Resources;
use AzureServiceBus\Common\Internal\Filters\WrapFilter;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for class ServiceBusSettings.
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
class ServiceBusSettingsTest extends TestCase
{
    public function setUp(): void
    {
        $property = new \ReflectionProperty('AzureServiceBus\Common\Internal\ServiceBusSettings', 'isInitialized');
        $property->setAccessible(true);
        $property->setValue(false);
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::init
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::__construct
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::getValidator
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::optional
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::allRequired
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::setting
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithServiceBusAutomaticCase()
    {
        // Setup
        $namespace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namespace.servicebus.windows.net";
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = "https://$namespace-sb.accesscontrol.windows.net/WRAPv0.9";
        $connectionString = "Endpoint=$expectedServiceBusEndpoint;SharedSecretIssuer=$expectedWrapName;SharedSecretValue=$expectedWrapPassword";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('AzureServiceBus\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::init
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::__construct
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::getValidator
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::optional
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::allRequired
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::setting
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithMissingServiceBusEndpointFail()
    {
        // Setup
        $connectionString = 'SharedSecretIssuer=name;SharedSecretValue=password';
        $expectedMsg = sprintf(Resources::MISSING_CONNECTION_STRING_SETTINGS, $connectionString);

        $this->expectException('\RuntimeException', $expectedMsg);

        // Test
        ServiceBusSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::init
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::__construct
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::getValidator
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::optional
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::allRequired
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::setting
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithInvalidServiceBusKeyFail()
    {
        // Setup
        $invalidKey = 'InvalidKey';
        $connectionString = "$invalidKey=value;SharedSecretIssuer=name;SharedSecretValue=password";
        $expectedMsg = sprintf(
            Resources::INVALID_CONNECTION_STRING_SETTING_KEY,
            $invalidKey,
            implode("\n", ['Endpoint', 'SharedSecretIssuer', 'SharedSecretValue'])
        );
        $this->expectException('\RuntimeException', $expectedMsg);

        // Test
        ServiceBusSettings::createFromConnectionString($connectionString);
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::getServiceBusEndpointUri
     */
    public function testGetServiceBusEndpointUri()
    {
        // Setup
        $expected = 'serviceBusEndpointUri';
        $setting = new ServiceBusSettings($expected, null);

        // Test
        $actual = $setting->getServiceBusEndpointUri();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::getFilter
     */
    public function testGetFilter()
    {
        // Setup
        $expected = 'filter';
        $setting = new ServiceBusSettings(null, $expected);

        // Test
        $actual = $setting->getFilter();

        // Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::init
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::__construct
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::getValidator
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::optional
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::allRequired
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::setting
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithCaseInvesitive()
    {
        // Setup
        $namepspace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namepspace.servicebus.windows.net";
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = "https://$namepspace-sb.accesscontrol.windows.net/WRAPv0.9";
        $connectionString = "eNdPoinT=$expectedServiceBusEndpoint;sHarEdsecRetiSsuer=$expectedWrapName;shArEdsecrEtvAluE=$expectedWrapPassword";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('AzureServiceBus\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
    }

    /**
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::createFromConnectionString
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::init
     * @covers \AzureServiceBus\Common\Internal\ServiceBusSettings::__construct
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::getValidator
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::optional
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::allRequired
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::setting
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::settingWithFunc
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::matchedSpecification
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::parseAndValidateKeys
     * @covers \AzureServiceBus\Common\Internal\ServiceSettings::noMatch
     */
    public function testCreateFromConnectionStringWithWrapEndpoint()
    {
        // Setup
        $namespace = 'mynamespace';
        $expectedServiceBusEndpoint = "https://$namespace.servicebus.windows.net";
        $expectedWrapName = 'myname';
        $expectedWrapPassword = 'mypassword';
        $expectedWrapEndpointUri = 'https://mysb-sb.accesscontrol.chinacloudapi.cn/';
        $connectionString = "Endpoint=$expectedServiceBusEndpoint;StsEndpoint=$expectedWrapEndpointUri;SharedSecretIssuer=$expectedWrapName;SharedSecretValue=$expectedWrapPassword";

        // Test
        $actual = ServiceBusSettings::createFromConnectionString($connectionString);

        // Assert
        $this->assertInstanceOf('AzureServiceBus\Common\Internal\IServiceFilter', $actual->getFilter());
        $this->assertEquals($expectedServiceBusEndpoint, $actual->getServiceBusEndpointUri());
    }
}
