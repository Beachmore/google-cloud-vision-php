<?php
/*
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * This file was automatically generated - do not edit!
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

// [START livestream_v1_generated_LivestreamService_UpdateChannel_sync]
use Google\ApiCore\ApiException;
use Google\ApiCore\OperationResponse;
use Google\Cloud\Video\LiveStream\V1\Channel;
use Google\Cloud\Video\LiveStream\V1\Channel\Output;
use Google\Cloud\Video\LiveStream\V1\LivestreamServiceClient;
use Google\Rpc\Status;

/**
 * Updates the specified channel.
 *
 * This sample has been automatically generated and should be regarded as a code
 * template only. It will require modifications to work:
 *  - It may require correct/in-range values for request initialization.
 *  - It may require specifying regional endpoints when creating the service client,
 *    please see the apiEndpoint client configuration option for more details.
 */
function update_channel_sample(): void
{
    // Create a client.
    $livestreamServiceClient = new LivestreamServiceClient();

    // Prepare any non-scalar elements to be passed along with the request.
    $channelOutput = new Output();
    $channel = (new Channel())
        ->setOutput($channelOutput);

    // Call the API and handle any network failures.
    try {
        /** @var OperationResponse $response */
        $response = $livestreamServiceClient->updateChannel($channel);
        $response->pollUntilComplete();

        if ($response->operationSucceeded()) {
            /** @var Channel $result */
            $result = $response->getResult();
            printf('Operation successful with response data: %s' . PHP_EOL, $result->serializeToJsonString());
        } else {
            /** @var Status $error */
            $error = $response->getError();
            printf('Operation failed with error data: %s' . PHP_EOL, $error->serializeToJsonString());
        }
    } catch (ApiException $ex) {
        printf('Call failed with message: %s' . PHP_EOL, $ex->getMessage());
    }
}
// [END livestream_v1_generated_LivestreamService_UpdateChannel_sync]
