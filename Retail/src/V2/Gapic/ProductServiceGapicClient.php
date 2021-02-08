<?php
/*
 * Copyright 2021 Google LLC
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
 * This file was generated from the file
 * https://github.com/google/googleapis/blob/master/google/cloud/retail/v2/product_service.proto
 * and updates to that file get reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Retail\V2\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Retail\V2\CreateProductRequest;
use Google\Cloud\Retail\V2\DeleteProductRequest;
use Google\Cloud\Retail\V2\GetProductRequest;
use Google\Cloud\Retail\V2\ImportErrorsConfig;
use Google\Cloud\Retail\V2\ImportProductsRequest;
use Google\Cloud\Retail\V2\Product;
use Google\Cloud\Retail\V2\ProductInputConfig;
use Google\Cloud\Retail\V2\UpdateProductRequest;
use Google\LongRunning\Operation;
use Google\Protobuf\FieldMask;
use Google\Protobuf\GPBEmpty;

/**
 * Service Description: Service for ingesting [Product][google.cloud.retail.v2.Product] information
 * of the customer's website.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $productServiceClient = new ProductServiceClient();
 * try {
 *     $formattedParent = $productServiceClient->branchName('[PROJECT]', '[LOCATION]', '[CATALOG]', '[BRANCH]');
 *     $product = new Product();
 *     $productId = '';
 *     $response = $productServiceClient->createProduct($formattedParent, $product, $productId);
 * } finally {
 *     $productServiceClient->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To assist
 * with these names, this class includes a format method for each type of name, and additionally
 * a parseName method to extract the individual identifiers contained within formatted names
 * that are returned by the API.
 *
 * @experimental
 */
class ProductServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.retail.v2.ProductService';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'retail.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];
    private static $branchNameTemplate;
    private static $productNameTemplate;
    private static $pathTemplateMap;

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS.':'.self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__.'/../resources/product_service_client_config.json',
            'descriptorsConfigPath' => __DIR__.'/../resources/product_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__.'/../resources/product_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__.'/../resources/product_service_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getBranchNameTemplate()
    {
        if (null == self::$branchNameTemplate) {
            self::$branchNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}');
        }

        return self::$branchNameTemplate;
    }

    private static function getProductNameTemplate()
    {
        if (null == self::$productNameTemplate) {
            self::$productNameTemplate = new PathTemplate('projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}/products/{product}');
        }

        return self::$productNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (null == self::$pathTemplateMap) {
            self::$pathTemplateMap = [
                'branch' => self::getBranchNameTemplate(),
                'product' => self::getProductNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a branch resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $branch
     *
     * @return string The formatted branch resource.
     * @experimental
     */
    public static function branchName($project, $location, $catalog, $branch)
    {
        return self::getBranchNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'branch' => $branch,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent
     * a product resource.
     *
     * @param string $project
     * @param string $location
     * @param string $catalog
     * @param string $branch
     * @param string $product
     *
     * @return string The formatted product resource.
     * @experimental
     */
    public static function productName($project, $location, $catalog, $branch, $product)
    {
        return self::getProductNameTemplate()->render([
            'project' => $project,
            'location' => $location,
            'catalog' => $catalog,
            'branch' => $branch,
            'product' => $product,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - branch: projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}
     * - product: projects/{project}/locations/{location}/catalogs/{catalog}/branches/{branch}/products/{product}.
     *
     * The optional $template argument can be supplied to specify a particular pattern, and must
     * match one of the templates listed above. If no $template argument is provided, or if the
     * $template argument does not match one of the templates listed, then parseName will check
     * each of the supported templates, and return the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();

        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }
        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     * @experimental
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started
     * by a long running API method. If $methodName is not provided, or does
     * not match a long running API method, then the operation can still be
     * resumed, but the OperationResponse object will not deserialize the
     * final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     * @experimental
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();

        return $operation;
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *                       Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'retail.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the client.
     *           For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()}.
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either a
     *           path to a JSON file, or a PHP array containing the decoded JSON data.
     *           By default this settings points to the default client config file, which is provided
     *           in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string `rest`
     *           or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already instantiated
     *           {@see \Google\ApiCore\Transport\TransportInterface} object. Note that when this
     *           object is provided, any settings in $transportConfig, and any `$apiEndpoint`
     *           setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...]
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     * }
     *
     * @throws ValidationException
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /**
     * Creates a [Product][google.cloud.retail.v2.Product].
     *
     * Sample code:
     * ```
     * $productServiceClient = new ProductServiceClient();
     * try {
     *     $formattedParent = $productServiceClient->branchName('[PROJECT]', '[LOCATION]', '[CATALOG]', '[BRANCH]');
     *     $product = new Product();
     *     $productId = '';
     *     $response = $productServiceClient->createProduct($formattedParent, $product, $productId);
     * } finally {
     *     $productServiceClient->close();
     * }
     * ```
     *
     * @param string  $parent    Required. The parent catalog resource name, such as
     *                           `projects/&#42;/locations/global/catalogs/default_catalog/branches/default_branch`.
     * @param Product $product   Required. The [Product][google.cloud.retail.v2.Product] to create.
     * @param string  $productId Required. The ID to use for the [Product][google.cloud.retail.v2.Product],
     *                           which will become the final component of the
     *                           [Product.name][google.cloud.retail.v2.Product.name].
     *
     * If the caller does not have permission to create the
     * [Product][google.cloud.retail.v2.Product], regardless of whether or not it
     * exists, a PERMISSION_DENIED error is returned.
     *
     * This field must be unique among all
     * [Product][google.cloud.retail.v2.Product]s with the same
     * [parent][google.cloud.retail.v2.CreateProductRequest.parent]. Otherwise, an
     * ALREADY_EXISTS error is returned.
     *
     * This field must be a UTF-8 encoded string with a length limit of 128
     * characters. Otherwise, an INVALID_ARGUMENT error is returned.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2\Product
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function createProduct($parent, $product, $productId, array $optionalArgs = [])
    {
        $request = new CreateProductRequest();
        $request->setParent($parent);
        $request->setProduct($product);
        $request->setProductId($productId);

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'CreateProduct',
            Product::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets a [Product][google.cloud.retail.v2.Product].
     *
     * Sample code:
     * ```
     * $productServiceClient = new ProductServiceClient();
     * try {
     *     $formattedName = $productServiceClient->productName('[PROJECT]', '[LOCATION]', '[CATALOG]', '[BRANCH]', '[PRODUCT]');
     *     $response = $productServiceClient->getProduct($formattedName);
     * } finally {
     *     $productServiceClient->close();
     * }
     * ```
     *
     * @param string $name Required. Full resource name of [Product][google.cloud.retail.v2.Product],
     *                     such as
     *                     `projects/&#42;/locations/global/catalogs/default_catalog/branches/default_branch/products/some_product_id`.
     *
     * If the caller does not have permission to access the
     * [Product][google.cloud.retail.v2.Product], regardless of whether or not it
     * exists, a PERMISSION_DENIED error is returned.
     *
     * If the requested [Product][google.cloud.retail.v2.Product] does not exist,
     * a NOT_FOUND error is returned.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2\Product
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function getProduct($name, array $optionalArgs = [])
    {
        $request = new GetProductRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'GetProduct',
            Product::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates a [Product][google.cloud.retail.v2.Product].
     *
     * Sample code:
     * ```
     * $productServiceClient = new ProductServiceClient();
     * try {
     *     $product = new Product();
     *     $response = $productServiceClient->updateProduct($product);
     * } finally {
     *     $productServiceClient->close();
     * }
     * ```
     *
     * @param Product $product Required. The product to update/create.
     *
     * If the caller does not have permission to update the
     * [Product][google.cloud.retail.v2.Product], regardless of whether or not it
     * exists, a PERMISSION_DENIED error is returned.
     *
     * If the [Product][google.cloud.retail.v2.Product] to update does not exist,
     * a NOT_FOUND error is returned.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type FieldMask $updateMask
     *          Indicates which fields in the provided
     *          [Product][google.cloud.retail.v2.Product] to update. The immutable and
     *          output only fields are NOT supported. If not set, all supported fields (the
     *          fields that are neither immutable nor output only) are updated.
     *
     *          If an unsupported or unknown field is provided, an INVALID_ARGUMENT error
     *          is returned.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Retail\V2\Product
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function updateProduct($product, array $optionalArgs = [])
    {
        $request = new UpdateProductRequest();
        $request->setProduct($product);
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'product.name' => $request->getProduct()->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'UpdateProduct',
            Product::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Deletes a [Product][google.cloud.retail.v2.Product].
     *
     * Sample code:
     * ```
     * $productServiceClient = new ProductServiceClient();
     * try {
     *     $formattedName = $productServiceClient->productName('[PROJECT]', '[LOCATION]', '[CATALOG]', '[BRANCH]', '[PRODUCT]');
     *     $productServiceClient->deleteProduct($formattedName);
     * } finally {
     *     $productServiceClient->close();
     * }
     * ```
     *
     * @param string $name Required. Full resource name of [Product][google.cloud.retail.v2.Product],
     *                     such as
     *                     `projects/&#42;/locations/global/catalogs/default_catalog/branches/default_branch/products/some_product_id`.
     *
     * If the caller does not have permission to delete the
     * [Product][google.cloud.retail.v2.Product], regardless of whether or not it
     * exists, a PERMISSION_DENIED error is returned.
     *
     * If the [Product][google.cloud.retail.v2.Product] to delete does not exist,
     * a NOT_FOUND error is returned.
     * @param array $optionalArgs {
     *                            Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function deleteProduct($name, array $optionalArgs = [])
    {
        $request = new DeleteProductRequest();
        $request->setName($name);

        $requestParams = new RequestParamsHeaderDescriptor([
          'name' => $request->getName(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startCall(
            'DeleteProduct',
            GPBEmpty::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Bulk import of multiple [Product][google.cloud.retail.v2.Product]s.
     *
     * Request processing may be synchronous. No partial updating is supported.
     * Non-existing items are created.
     *
     * Note that it is possible for a subset of the
     * [Product][google.cloud.retail.v2.Product]s to be successfully updated.
     *
     * Sample code:
     * ```
     * $productServiceClient = new ProductServiceClient();
     * try {
     *     $parent = '';
     *     $inputConfig = new ProductInputConfig();
     *     $operationResponse = $productServiceClient->importProducts($parent, $inputConfig);
     *     $operationResponse->pollUntilComplete();
     *     if ($operationResponse->operationSucceeded()) {
     *         $result = $operationResponse->getResult();
     *         // doSomethingWith($result)
     *     } else {
     *         $error = $operationResponse->getError();
     *         // handleError($error)
     *     }
     *
     *
     *     // Alternatively:
     *
     *     // start the operation, keep the operation name, and resume later
     *     $operationResponse = $productServiceClient->importProducts($parent, $inputConfig);
     *     $operationName = $operationResponse->getName();
     *     // ... do other work
     *     $newOperationResponse = $productServiceClient->resumeOperation($operationName, 'importProducts');
     *     while (!$newOperationResponse->isDone()) {
     *         // ... do other work
     *         $newOperationResponse->reload();
     *     }
     *     if ($newOperationResponse->operationSucceeded()) {
     *       $result = $newOperationResponse->getResult();
     *       // doSomethingWith($result)
     *     } else {
     *       $error = $newOperationResponse->getError();
     *       // handleError($error)
     *     }
     * } finally {
     *     $productServiceClient->close();
     * }
     * ```
     *
     * @param string $parent Required.
     *                       `projects/1234/locations/global/catalogs/default_catalog/branches/default_branch`
     *
     * If no updateMask is specified, requires products.create permission.
     * If updateMask is specified, requires products.update permission.
     * @param ProductInputConfig $inputConfig  Required. The desired input location of the data.
     * @param array              $optionalArgs {
     *                                         Optional.
     *
     *     @type ImportErrorsConfig $errorsConfig
     *          The desired location of errors incurred during the Import.
     *     @type FieldMask $updateMask
     *          Indicates which fields in the provided imported 'products' to update. If
     *          not set, will by default update all fields.
     *     @type RetrySettings|array $retrySettings
     *          Retry settings to use for this call. Can be a
     *          {@see Google\ApiCore\RetrySettings} object, or an associative array
     *          of retry settings parameters. See the documentation on
     *          {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\OperationResponse
     *
     * @throws ApiException if the remote call fails
     * @experimental
     */
    public function importProducts($parent, $inputConfig, array $optionalArgs = [])
    {
        $request = new ImportProductsRequest();
        $request->setParent($parent);
        $request->setInputConfig($inputConfig);
        if (isset($optionalArgs['errorsConfig'])) {
            $request->setErrorsConfig($optionalArgs['errorsConfig']);
        }
        if (isset($optionalArgs['updateMask'])) {
            $request->setUpdateMask($optionalArgs['updateMask']);
        }

        $requestParams = new RequestParamsHeaderDescriptor([
          'parent' => $request->getParent(),
        ]);
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();

        return $this->startOperationsCall(
            'ImportProducts',
            $optionalArgs,
            $request,
            $this->getOperationsClient()
        )->wait();
    }
}
