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

namespace Tests\functional\AzureServiceBus\ServiceBus;

use Tests\Framework\FiddlerFilter;
use Tests\Framework\ServiceBusRestProxyTestBase;
use AzureServiceBus\Common\Internal\Utilities;
use AzureServiceBus\ServiceBus\Models\ReceiveMessageOptions;
use AzureServiceBus\ServiceBus\Models\QueueInfo;

class IntegrationTestBase extends ServiceBusRestProxyTestBase
{
    private static $isOneTimeSetup = false;

    public function setUp(): void
    {
        parent::setUp();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->serviceBusWrapper = $this->serviceBusWrapper->withFilter($fiddlerFilter);
        if (!self::$isOneTimeSetup) {
            $this->doOneTimeSetup();
            self::$isOneTimeSetup = true;
        }
    }

    /**
     * @covers \AzureServiceBus\ServiceBus\ServiceBusRestProxy::createQueue
     * @covers \AzureServiceBus\ServiceBus\ServiceBusRestProxy::deleteQueue
     * @covers \AzureServiceBus\ServiceBus\ServiceBusRestProxy::receiveQueueMessage
     */
    private function doOneTimeSetup()
    {
        $testAlphaExists = false;
        $queues = $this->serviceBusWrapper->listQueues()->getQueueInfos();
        foreach ($queues as $queue) {
            $queueName = $queue->getTitle();
            if (Utilities::startsWith($queueName, 'Test') || Utilities::startsWith($queueName, 'test')) {
                if (strtolower($queueName) == strtolower('TestAlpha')) {
                    $testAlphaExists = true;
                    $count = $queue->getQueueDescription()->getMessageCount();
                    for ($i = 0; $i != $count; ++$i) {
                        $opts = new ReceiveMessageOptions();
                        $opts->setTimeout(20);
                        try {
                            $this->serviceBusWrapper->receiveQueueMessage($queueName, $opts);
                        } catch (\Exception $ex) {
                            error_log($ex->getMessage());
                        }
                    }
                } else {
                    try {
                        $this->serviceBusWrapper->deleteQueue($queueName);
                    } catch (\Exception $ex) {
                        error_log($ex->getMessage());
                    }
                }
            }
        }
        foreach ($this->serviceBusWrapper->listTopics()->getTopicInfos() as $topic) {
            $topicName = $topic->getTitle();
            if (Utilities::startsWith($topicName, 'Test') || Utilities::startsWith($topicName, 'test')) {
                try {
                    $this->serviceBusWrapper->deleteTopic($topicName);
                } catch (\Exception $ex) {
                    error_log($ex->getMessage());
                }
            }
        }

        if (!$testAlphaExists) {
            try {
                $this->serviceBusWrapper->createQueue(new QueueInfo('TestAlpha'));
            } catch (\Exception $ex) {
                error_log($ex->getMessage());
            }
        }
    }

    public static function tearDownAfterClass()
    {
        if (self::$isOneTimeSetup) {
            self::$isOneTimeSetup = false;
        }
        parent::tearDownAfterClass();
    }
}
