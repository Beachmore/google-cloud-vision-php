<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/iap/v1/service.proto

namespace Google\Cloud\Iap\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for propagating attributes to applications protected
 * by IAP.
 *
 * Generated from protobuf message <code>google.cloud.iap.v1.AttributePropagationSettings</code>
 */
class AttributePropagationSettings extends \Google\Protobuf\Internal\Message
{
    /**
     * Raw string CEL expression. Must return a list of attributes. Maximum of 45
     * attributes can be selected. Expressions can select different attribute
     * types from `attributes`: `attributes.saml_attributes`,
     * `attributes.iap_attributes`. Limited functions are supported:
     *  - `filter: <list>.filter(<iter_var>, <predicate>)` -> returns a subset of
     *  `<list>` where `<predicate>` is true for every item.
     *  - `in: <var> in <list>` -> returns true if `<list>` contains `<var>`
     *  - `selectByName: <list>.selectByName(<string>)` -> returns the attribute
     *  in
     *  `<list>` with the given `<string>` name, otherwise returns empty.
     *  - `emitAs: <attribute>.emitAs(<string>)` -> sets the `<attribute>` name
     *  field to the given `<string>` for propagation in selected output
     *  credentials.
     *  - `strict: <attribute>.strict()` -> ignore the `x-goog-iap-attr-` prefix
     *  for the provided `<attribute>` when propagating via the `HEADER` output
     *  credential, i.e. request headers.
     *  - `append: <target_list>.append(<attribute>)` OR
     *  `<target_list>.append(<list>)` -> append the provided `<attribute>` or
     *  `<list>` onto the end of `<target_list>`.
     * Example expression: `attributes.saml_attributes.filter(x, x.name in
     * ['test']).append(attributes.iap_attributes.selectByName('exact').emitAs('custom').strict())`
     *
     * Generated from protobuf field <code>optional string expression = 1;</code>
     */
    private $expression = null;
    /**
     * Which output credentials attributes selected by the CEL expression should
     * be propagated in. All attributes will be fully duplicated in each selected
     * output credential.
     *
     * Generated from protobuf field <code>repeated .google.cloud.iap.v1.AttributePropagationSettings.OutputCredentials output_credentials = 2;</code>
     */
    private $output_credentials;
    /**
     * Whether the provided attribute propagation settings should be evaluated on
     * user requests. If set to true, attributes returned from the expression will
     * be propagated in the set output credentials.
     *
     * Generated from protobuf field <code>optional bool enable = 3;</code>
     */
    private $enable = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $expression
     *           Raw string CEL expression. Must return a list of attributes. Maximum of 45
     *           attributes can be selected. Expressions can select different attribute
     *           types from `attributes`: `attributes.saml_attributes`,
     *           `attributes.iap_attributes`. Limited functions are supported:
     *            - `filter: <list>.filter(<iter_var>, <predicate>)` -> returns a subset of
     *            `<list>` where `<predicate>` is true for every item.
     *            - `in: <var> in <list>` -> returns true if `<list>` contains `<var>`
     *            - `selectByName: <list>.selectByName(<string>)` -> returns the attribute
     *            in
     *            `<list>` with the given `<string>` name, otherwise returns empty.
     *            - `emitAs: <attribute>.emitAs(<string>)` -> sets the `<attribute>` name
     *            field to the given `<string>` for propagation in selected output
     *            credentials.
     *            - `strict: <attribute>.strict()` -> ignore the `x-goog-iap-attr-` prefix
     *            for the provided `<attribute>` when propagating via the `HEADER` output
     *            credential, i.e. request headers.
     *            - `append: <target_list>.append(<attribute>)` OR
     *            `<target_list>.append(<list>)` -> append the provided `<attribute>` or
     *            `<list>` onto the end of `<target_list>`.
     *           Example expression: `attributes.saml_attributes.filter(x, x.name in
     *           ['test']).append(attributes.iap_attributes.selectByName('exact').emitAs('custom').strict())`
     *     @type array<int>|\Google\Protobuf\Internal\RepeatedField $output_credentials
     *           Which output credentials attributes selected by the CEL expression should
     *           be propagated in. All attributes will be fully duplicated in each selected
     *           output credential.
     *     @type bool $enable
     *           Whether the provided attribute propagation settings should be evaluated on
     *           user requests. If set to true, attributes returned from the expression will
     *           be propagated in the set output credentials.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Iap\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Raw string CEL expression. Must return a list of attributes. Maximum of 45
     * attributes can be selected. Expressions can select different attribute
     * types from `attributes`: `attributes.saml_attributes`,
     * `attributes.iap_attributes`. Limited functions are supported:
     *  - `filter: <list>.filter(<iter_var>, <predicate>)` -> returns a subset of
     *  `<list>` where `<predicate>` is true for every item.
     *  - `in: <var> in <list>` -> returns true if `<list>` contains `<var>`
     *  - `selectByName: <list>.selectByName(<string>)` -> returns the attribute
     *  in
     *  `<list>` with the given `<string>` name, otherwise returns empty.
     *  - `emitAs: <attribute>.emitAs(<string>)` -> sets the `<attribute>` name
     *  field to the given `<string>` for propagation in selected output
     *  credentials.
     *  - `strict: <attribute>.strict()` -> ignore the `x-goog-iap-attr-` prefix
     *  for the provided `<attribute>` when propagating via the `HEADER` output
     *  credential, i.e. request headers.
     *  - `append: <target_list>.append(<attribute>)` OR
     *  `<target_list>.append(<list>)` -> append the provided `<attribute>` or
     *  `<list>` onto the end of `<target_list>`.
     * Example expression: `attributes.saml_attributes.filter(x, x.name in
     * ['test']).append(attributes.iap_attributes.selectByName('exact').emitAs('custom').strict())`
     *
     * Generated from protobuf field <code>optional string expression = 1;</code>
     * @return string
     */
    public function getExpression()
    {
        return isset($this->expression) ? $this->expression : '';
    }

    public function hasExpression()
    {
        return isset($this->expression);
    }

    public function clearExpression()
    {
        unset($this->expression);
    }

    /**
     * Raw string CEL expression. Must return a list of attributes. Maximum of 45
     * attributes can be selected. Expressions can select different attribute
     * types from `attributes`: `attributes.saml_attributes`,
     * `attributes.iap_attributes`. Limited functions are supported:
     *  - `filter: <list>.filter(<iter_var>, <predicate>)` -> returns a subset of
     *  `<list>` where `<predicate>` is true for every item.
     *  - `in: <var> in <list>` -> returns true if `<list>` contains `<var>`
     *  - `selectByName: <list>.selectByName(<string>)` -> returns the attribute
     *  in
     *  `<list>` with the given `<string>` name, otherwise returns empty.
     *  - `emitAs: <attribute>.emitAs(<string>)` -> sets the `<attribute>` name
     *  field to the given `<string>` for propagation in selected output
     *  credentials.
     *  - `strict: <attribute>.strict()` -> ignore the `x-goog-iap-attr-` prefix
     *  for the provided `<attribute>` when propagating via the `HEADER` output
     *  credential, i.e. request headers.
     *  - `append: <target_list>.append(<attribute>)` OR
     *  `<target_list>.append(<list>)` -> append the provided `<attribute>` or
     *  `<list>` onto the end of `<target_list>`.
     * Example expression: `attributes.saml_attributes.filter(x, x.name in
     * ['test']).append(attributes.iap_attributes.selectByName('exact').emitAs('custom').strict())`
     *
     * Generated from protobuf field <code>optional string expression = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setExpression($var)
    {
        GPBUtil::checkString($var, True);
        $this->expression = $var;

        return $this;
    }

    /**
     * Which output credentials attributes selected by the CEL expression should
     * be propagated in. All attributes will be fully duplicated in each selected
     * output credential.
     *
     * Generated from protobuf field <code>repeated .google.cloud.iap.v1.AttributePropagationSettings.OutputCredentials output_credentials = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOutputCredentials()
    {
        return $this->output_credentials;
    }

    /**
     * Which output credentials attributes selected by the CEL expression should
     * be propagated in. All attributes will be fully duplicated in each selected
     * output credential.
     *
     * Generated from protobuf field <code>repeated .google.cloud.iap.v1.AttributePropagationSettings.OutputCredentials output_credentials = 2;</code>
     * @param array<int>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOutputCredentials($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::ENUM, \Google\Cloud\Iap\V1\AttributePropagationSettings\OutputCredentials::class);
        $this->output_credentials = $arr;

        return $this;
    }

    /**
     * Whether the provided attribute propagation settings should be evaluated on
     * user requests. If set to true, attributes returned from the expression will
     * be propagated in the set output credentials.
     *
     * Generated from protobuf field <code>optional bool enable = 3;</code>
     * @return bool
     */
    public function getEnable()
    {
        return isset($this->enable) ? $this->enable : false;
    }

    public function hasEnable()
    {
        return isset($this->enable);
    }

    public function clearEnable()
    {
        unset($this->enable);
    }

    /**
     * Whether the provided attribute propagation settings should be evaluated on
     * user requests. If set to true, attributes returned from the expression will
     * be propagated in the set output credentials.
     *
     * Generated from protobuf field <code>optional bool enable = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnable($var)
    {
        GPBUtil::checkBool($var);
        $this->enable = $var;

        return $this;
    }

}

