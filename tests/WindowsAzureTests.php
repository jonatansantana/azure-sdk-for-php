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
 * @deprecated since version 0.4.2 , to be removed in 0.5.0. Please use `vendor/autoload.php` instead.
 */
trigger_error(sprintf('Usage of `%s` has been deprecated since version 0.4.2 and will be removed in 0.5.0. '.
   'Please use `vendor/autoload.php` instead, which is generated during the install process by Composer.', __FILE__), E_USER_DEPRECATED);

require dirname(__DIR__).'/vendor/autoload.php';

spl_autoload_register(
   function ($class) {
      static $classes = null;
      if ($classes === null) {
          $classes = [
            'tests\\framework\\blobservicerestproxytestbase' => '/framework/BlobServiceRestProxyTestBase.php',
            'tests\\framework\\fiddlerfilter' => '/framework/FiddlerFilter.php',
            'tests\\framework\\queueservicerestproxytestbase' => '/framework/QueueServiceRestProxyTestBase.php',
            'tests\\framework\\restproxytestbase' => '/framework/RestProxyTestBase.php',
            'tests\\framework\\servicebusrestproxytestbase' => '/framework/ServiceBusRestProxyTestBase.php',
            'tests\\framework\\servicemanagementrestproxytestbase' => '/framework/ServiceManagementRestProxyTestBase.php',
            'tests\\framework\\servicerestproxytestbase' => '/framework/ServiceRestProxyTestBase.php',
            'tests\\framework\\tableservicerestproxytestbase' => '/framework/TableServiceRestProxyTestBase.php',
            'tests\\framework\\testresources' => '/framework/TestResources.php',
            'tests\\framework\\virtualfilesystem' => '/framework/VirtualFileSystem.php',
            'tests\\functional\\AzureServiceBus\\blobservicefunctionaltestdata' => '/functional/WindowsAzure/BlobServiceFunctionalTestData.php',
             'tests\\functional\\AzureServiceBus\\servicebus\\brokerpropertiesmappertest' => '/functional/WindowsAzure/ServiceBus/BrokerPropertiesMapperTest.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\custompropertiesmappertest' => '/functional/WindowsAzure/ServiceBus/CustomPropertiesMapperTest.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\integrationtestbase' => '/functional/WindowsAzure/ServiceBus/IntegrationTestBase.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\scenariotestbase' => '/functional/WindowsAzure/ServiceBus/ScenarioTestBase.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\servicebusintegrationtest' => '/functional/WindowsAzure/ServiceBus/ServiceBusIntegrationTest.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\servicebusqueuetest' => '/functional/WindowsAzure/ServiceBus/ServiceBusQueueTest.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\servicebustopictest' => '/functional/WindowsAzure/ServiceBus/ServiceBusTopicTest.php',
            'tests\\functional\\AzureServiceBus\\servicebus\\wraptokenmanagertest' => '/functional/WindowsAzure/ServiceBus/WrapTokenManagerTest.php',
            'tests\\mock\\AzureServiceBus\\common\\internal\\authentication\\oauthschememock' => '/mock/WindowsAzure/Common/Internal/Authentication/OAuthSchemeMock.php',
            'tests\\mock\\AzureServiceBus\\common\\internal\\authentication\\sharedkeyauthschememock' => '/mock/WindowsAzure/Common/Internal/Authentication/SharedKeyAuthSchemeMock.php',
            'tests\\mock\\AzureServiceBus\\common\\internal\\authentication\\storageauthschememock' => '/mock/WindowsAzure/Common/Internal/Authentication/StorageAuthSchemeMock.php',
            'tests\\mock\\AzureServiceBus\\common\\internal\\authentication\\tablesharedkeyliteauthschememock' => '/mock/WindowsAzure/Common/Internal/Authentication/TableSharedKeyLiteAuthSchemeMock.php',
            'tests\\mock\\AzureServiceBus\\common\\internal\\filters\\simplefiltermock' => '/mock/WindowsAzure/Common/Internal/Filters/SimpleFilterMock.php',
            'tests\\unit\\AzureServiceBus\\common\\cloudconfigurationmanagertest' => '/unit/WindowsAzure/Common/CloudConfigurationManagerTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\atomlinktest' => '/unit/WindowsAzure/Common/Internal/Atom/AtomLinkTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\categorytest' => '/unit/WindowsAzure/Common/Internal/Atom/CategoryTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\contenttest' => '/unit/WindowsAzure/Common/Internal/Atom/ContentTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\entrytest' => '/unit/WindowsAzure/Common/Internal/Atom/EntryTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\feedtest' => '/unit/WindowsAzure/Common/Internal/Atom/FeedTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\generatortest' => '/unit/WindowsAzure/Common/Internal/Atom/GeneratorTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\persontest' => '/unit/WindowsAzure/Common/Internal/Atom/PersonTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\atom\\sourcetest' => '/unit/WindowsAzure/Common/Internal/Atom/SourceTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\authentication\\oauthschemetest' => '/unit/WindowsAzure/Common/Internal/Authentication/OAuthSchemeTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\authentication\\sharedkeyauthschemetest' => '/unit/WindowsAzure/Common/Internal/Authentication/SharedKeyAuthSchemeTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\authentication\\storageauthschemetest' => '/unit/WindowsAzure/Common/Internal/Authentication/StorageAuthSchemeTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\authentication\\tablesharedkeyliteauthschemetest' => '/unit/WindowsAzure/Common/Internal/Authentication/TableSharedKeyLiteAuthSchemeTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\connectionstringparsertest' => '/unit/WindowsAzure/Common/Internal/ConnectionStringParserTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\connectionstringsourcetest' => '/unit/WindowsAzure/Common/Internal/ConnectionStringSourceTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\filters\\authenticationfiltertest' => '/unit/WindowsAzure/Common/Internal/Filters/AuthenticationFilterTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\filters\\datefiltertest' => '/unit/WindowsAzure/Common/Internal/Filters/DateFilterTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\filters\\headersfiltertest' => '/unit/WindowsAzure/Common/Internal/Filters/HeadersFilterTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\filters\\wrapfiltertest' => '/unit/WindowsAzure/Common/Internal/Filters/WrapFilterTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\http\\batchrequesttest' => '/unit/WindowsAzure/Common/Internal/Http/BatchRequestTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\http\\batchresponsetest' => '/unit/WindowsAzure/Common/Internal/Http/BatchResponseTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\http\\httpcallcontexttest' => '/unit/WindowsAzure/Common/Internal/Http/HttpCallContextTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\http\\httpclienttest' => '/unit/WindowsAzure/Common/Internal/Http/HttpClientTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\http\\urltest' => '/unit/WindowsAzure/Common/Internal/Http/UrlTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\invalidargumenttypeexceptiontest' => '/unit/WindowsAzure/Common/Internal/InvalidArgumentTypeExceptionTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\oauthrestproxytest' => '/unit/WindowsAzure/Common/Internal/OAuthRestProxyTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\serialization\\dummyclass' => '/unit/WindowsAzure/Common/Internal/Serialization/DummyClass.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\serialization\\jsonserializertest' => '/unit/WindowsAzure/Common/Internal/Serialization/JsonSerializerTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\serialization\\xmlserializertest' => '/unit/WindowsAzure/Common/Internal/Serialization/XmlSerializerTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\servicebussettingstest' => '/unit/WindowsAzure/Common/Internal/ServiceBusSettingsTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\servicemanagementsettingstest' => '/unit/WindowsAzure/Common/Internal/ServiceManagementSettingsTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\servicerestproxytest' => '/unit/WindowsAzure/Common/Internal/ServiceRestProxyTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\storageservicesettingstest' => '/unit/WindowsAzure/Common/Internal/StorageServiceSettingsTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\utilitiestest' => '/unit/WindowsAzure/Common/Internal/UtilitiesTest.php',
            'tests\\unit\\AzureServiceBus\\common\\internal\\validatetest' => '/unit/WindowsAzure/Common/Internal/ValidateTest.php',
            'tests\\unit\\AzureServiceBus\\common\\models\\oauthaccesstokentest' => '/unit/WindowsAzure/Common/Models/OAuthAccessTokenTest.php',
            'tests\\unit\\AzureServiceBus\\common\\serviceexceptiontest' => '/unit/WindowsAzure/Common/ServiceExceptionTest.php',
            'tests\\unit\\AzureServiceBus\\common\\servicesbuildertest' => '/unit/WindowsAzure/Common/ServicesBuilderTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\internal\\actiontest' => '/unit/WindowsAzure/ServiceBus/Internal/ActionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\internal\\activetokentest' => '/unit/WindowsAzure/ServiceBus/Internal/ActiveTokenTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\internal\\filtertest' => '/unit/WindowsAzure/ServiceBus/Internal/FilterTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\internal\\wraptokenmanagertest' => '/unit/WindowsAzure/ServiceBus/Internal/WrapTokenManagerTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\brokeredmessagetest' => '/unit/WindowsAzure/ServiceBus/models/BrokeredMessageTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\brokerpropertiestest' => '/unit/WindowsAzure/ServiceBus/models/BrokerPropertiesTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\correlationfiltertest' => '/unit/WindowsAzure/ServiceBus/models/CorrelationFilterTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\emptyruleactiontest' => '/unit/WindowsAzure/ServiceBus/models/EmptyRuleActionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\falsefiltertest' => '/unit/WindowsAzure/ServiceBus/models/FalseFilterTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ListOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listqueuesoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ListQueuesOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listqueuesresulttest' => '/unit/WindowsAzure/ServiceBus/models/ListQueuesResultTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listrulesoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ListRulesOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listrulesresulttest' => '/unit/WindowsAzure/ServiceBus/models/ListRulesResultTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listsubscriptionsoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ListSubscriptionsOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listsubscriptionsresulttest' => '/unit/WindowsAzure/ServiceBus/models/ListSubscriptionsResultTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listtopicsoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ListTopicsOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\listtopicsresulttest' => '/unit/WindowsAzure/ServiceBus/models/ListTopicsResultTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\queuedescriptiontest' => '/unit/WindowsAzure/ServiceBus/models/QueueDescriptionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\queueinfotest' => '/unit/WindowsAzure/ServiceBus/models/QueueInfoTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\receivemessageoptionstest' => '/unit/WindowsAzure/ServiceBus/models/ReceiveMessageOptionsTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\ruledescriptiontest' => '/unit/WindowsAzure/ServiceBus/models/RuleDescriptionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\ruleinfotest' => '/unit/WindowsAzure/ServiceBus/models/RuleInfoTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\sqlfiltertest' => '/unit/WindowsAzure/ServiceBus/models/SqlFilterTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\sqlruleactiontest' => '/unit/WindowsAzure/ServiceBus/models/SqlRuleActionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\subscriptiondescriptiontest' => '/unit/WindowsAzure/ServiceBus/models/SubscriptionDescriptionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\subscriptioninfotest' => '/unit/WindowsAzure/ServiceBus/models/SubscriptionInfoTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\topicdescriptiontest' => '/unit/WindowsAzure/ServiceBus/models/TopicDescriptionTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\topicinfotest' => '/unit/WindowsAzure/ServiceBus/models/TopicInfoTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\truefiltertest' => '/unit/WindowsAzure/ServiceBus/models/TrueFilterTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\models\\wrapaccesstokenresulttest' => '/unit/WindowsAzure/ServiceBus/models/WrapAccessTokenResultTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\servicebusrestproxytest' => '/unit/WindowsAzure/ServiceBus/ServiceBusRestProxyTest.php',
            'tests\\unit\\AzureServiceBus\\servicebus\\wraprestproxytest' => '/unit/WindowsAzure/ServiceBus/WrapRestProxyTest.php',
          ];
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
          require __DIR__.$classes[$cn];
      }
   }
);
