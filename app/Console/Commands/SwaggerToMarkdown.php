<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SwaggerToMarkdown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swagger:markdown';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'swagger api文档转化为markdown文档';

    protected $swaggerJsonFile;

    protected $markdownFile;

    protected $postmanFile;

    protected $title = 'API接口文档';

    protected $describe = 'API接口文档';

    protected $version = '1.0.0';

    protected $email = '597843857@qq.com';

    protected $servers = [];

    protected $serverUrl = '{schema}://127.0.0.1:8000';

    protected $serverAgreement = ['http'];

    protected $defaultServerAgreement = 'http';

    protected $paths = [];

    protected $requestHeader = 'application/json';

    protected $schema = 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        $this->swaggerJsonFile = config('l5-swagger.paths.docs') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_json');
        $this->markdownFile    = config('l5-swagger.paths.markdown') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_md');
        $this->postmanFile     = config('l5-swagger.paths.postman') . DIRECTORY_SEPARATOR . config('l5-swagger.paths.docs_postman');
        parent::__construct();
    }

    /**
     * @desc 主函数
     */
    public function handle()
    {
        // 获取swagger json数据并解码
        $swaggerJsonContent      =  File::get($this->swaggerJsonFile);
        $swaggerJsonContentArray = json_decode($swaggerJsonContent, true);
        // 获取文档基本信息
        $this->title    = $swaggerJsonContentArray['info']['title']            ?? $this->title;
        $this->describe = $swaggerJsonContentArray['info']['description']      ?? $this->describe;
        $this->version  = $swaggerJsonContentArray['info']['version']          ?? $this->version;
        $this->email    = $swaggerJsonContentArray['info']['contact']['email'] ?? $this->email;
        $this->servers  = $swaggerJsonContentArray['servers']                  ?? $this->servers;
        // 获取服务相关信息
        $servers = array_map(function ($item) {
            $this->defaultServerAgreement = $item['variables']['schema']['default'] ?? $this->defaultServerAgreement;
            $this->serverUrl = $item['url'] ?? $this->serverUrl;
            $this->serverUrl = str_replace('{schema}', $this->defaultServerAgreement, $this->serverUrl);
            $this->serverAgreement = implode(',', $item['variables']['schema']['enum'] ?? $this->serverAgreement);

            return [
                "> 基础地址：{$this->serverUrl}" . PHP_EOL,
                "> 支持协议：{$this->serverAgreement}" . PHP_EOL,
                "> 默认协议：{$this->defaultServerAgreement}" . PHP_EOL,
            ];
        }, $this->servers);
        // 处理接口文档信息
        $this->paths = $swaggerJsonContentArray['paths'] ?? $this->paths;
        // postman
        $postmanArray         = ['info' => [], 'item' => []];
        $postmanArray['info'] = [
            '_postman_id' => str_random(64) . '-' . time(),
            'name'        => $this->title,
            'schema'      => $this->schema,
        ];

        array_walk($this->paths, function ($value, $key) use (&$paths,$swaggerJsonContentArray, &$postmanArray) {
            $path = $key; // 请求路径
            // 处理相同路径的不通方式接口
            foreach ($value as $method => $apiInfo) {
                $summary = $apiInfo['summary']; // api文档标题
                $tag = $apiInfo['tags'][0]; // api文档标签
                $requestHeader = [];
                $requestBody = [];
                if (isset($apiInfo['security'])) {
                    $requestHeader = [
                        '** 请求头部 **' . PHP_EOL,
                        '| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |',
                        '| :---: | :----: | :---: | :---: | :---: |',
                        '| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |',
                    ];
                }
                // 处理path或者query参数
                if (isset($apiInfo['parameters'])) {
                    $requestUrlInfo = $this->_getParameters($swaggerJsonContentArray['components']['parameters'], $apiInfo['parameters']);
                    $requestBody = array_merge($requestBody, $requestUrlInfo['all'] ?? []);
                }
                // 处理请求体性参数
                if (isset($apiInfo['requestBody'])) {
                    $requestFormat = $apiInfo['requestBody']['content'] ? key($apiInfo['requestBody']['content']) : $this->requestHeader;
                    $requestInfo = $this->_getRequestBody($requestFormat, $swaggerJsonContentArray['components']['schemas'][str_replace('#/components/schemas/', '', $apiInfo['requestBody']['content'][$requestFormat]['schema']['$ref'])], $swaggerJsonContentArray);
                    $requestBody = array_merge($requestBody, $requestInfo['all'] ?? []);
                }
                // 处理响应参数
                $response = $this->_getResponse($swaggerJsonContentArray, $apiInfo['responses']);
                // 合成接口文档主体信息
                $paths[] = array_merge(
                    [
                        "## {$summary}<sup>{$tag}</sup>" . PHP_EOL,
                        '** 接口功能 **' . PHP_EOL,
                        "> {$summary}" . PHP_EOL,
                        '** 请求URL **' . PHP_EOL,
                        "> {$path}" . PHP_EOL,
                        '** HTTP请求方式 **' . PHP_EOL,
                        "> {$method}" . PHP_EOL,
                    ],
                    $requestHeader,
                    $requestBody,
                    $response
                );
                // 处理成postman格式
                $postmanArray['item'][] = $this->_handlePostman($summary, $path, $method, $requestFormat ?? '', isset($apiInfo['security']), $requestUrlInfo['example'] ?? [], $requestInfo['example'] ?? []);
            }
        });
        // 合成文档信息
        $title    = "# {$this->title}" . PHP_EOL;
        $version  = "** 版本号：{$this->version} **" . PHP_EOL;
        $email    = "** 联系人电子邮箱：{$this->email} **" . PHP_EOL;
        $describe = "** 描述：{$this->describe} **" . PHP_EOL;
        $doc      = [$title, $version, $email, $describe];
        $doc      = array_merge($doc, $servers, $paths);
        // 生成markdown文件
        File::put($this->markdownFile, collect($doc)->flatten()->implode(PHP_EOL));
        File::put($this->postmanFile, json_encode($postmanArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    private function _handlePostman($name, $path, $method, $requestFormat, $auth, $requestUrl, $requestBody)
    {
        if ($auth) {
            $auth = [
                'auth' => [
                    'type'   => 'oauth2',
                    'oauth2' => [
                        [
                            'key'   => 'accessToken',
                            'value' => '{{token}}',
                            'type'  => 'string',
                        ],
                        [
                            'key'   => 'addTokenTo',
                            'value' => 'header',
                            'type'  => 'string',
                        ],
                    ],
                ],
            ];
        } else {
            $auth = [];
        }
        $method = ['method' => $method];
        if ($requestBody) {
            $header = [
                'header' => [
                    [
                        'key'   => 'Content-Type',
                        'name'  => 'Content-Type',
                        'value' => $requestFormat,
                        'type'  => 'text',
                    ],
                ],
            ];
            if ('form-data' == $requestFormat) {
                $format = 'formdata';
                array_walk($requestBody, function (&$value, $key) {
                    $value = [
                        'key'   => $key,
                        'value' => $value,
                        'type'  => 'file' == $key ? 'file' : 'text',
                    ];
                });
            } else {
                $format      = 'raw';
                $requestBody = json_encode($requestBody, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
            $body = [
                'body' => [
                    'mode'    => $format,
                    $format   => $requestBody,
                    'options' => [
                        'raw' => [
                            'language' => 'json',
                        ],
                    ],
                ],
            ];
        } else {
            $header = [];
            $body   = [];
        }
        $params = $requestUrl ? implode('&', array_map(function ($item) {
            return $item['key'] . '=' . $item['value'];
        }, $requestUrl)) : '';
        $url = [
            'url' => [
                'raw'  => '{{host}}' . $path . ($params ? '?' . $params : ''),
                'host' => [
                    '{{host}}',
                ],
                'path'  => explode('/', $path),
                'query' => $requestUrl,
            ],
        ];
        $description = ['description' => $name];

        return [
            'name'    => $name,
            'request' => array_merge(
                $auth,
                $method,
                $header,
                $body,
                $url,
                $description
            ),
            'response' => [],
        ];
    }

    /**
     * @desc 处理请求体参数
     *
     * @param $requestHeader
     * @param $requestBody
     * @param $swaggerJsonContentArray
     *
     * @return array
     */
    private function _getRequestBody($requestHeader, $requestBody, $swaggerJsonContentArray)
    {
        $requestParams      = ['** 请求字段 **' . PHP_EOL];
        $requestExample     = $this->_getFieldAndExample($requestBody, $swaggerJsonContentArray, 'request');
        $requestBodyExample = array_merge(
            $requestParams,
            [
                "> 请求类型：{$requestHeader}" . PHP_EOL,
                '| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |',
                '| :---: | :----: | :---: | :---: | :---: |',
            ],
            $requestExample['field'],
            [
                PHP_EOL,
                '** 请求示例 **' . PHP_EOL,
                '```json',
                json_encode($requestExample['example'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                '```',
            ]
        );

        return ['all' => $requestBodyExample, 'example' => $requestExample['example']];
    }

    /**
     * @desc 处理path和query请求参数
     *
     * @param $componentsParameters
     * @param $parameters
     *
     * @return array
     */
    private function _getParameters($componentsParameters, $parameters)
    {
        $requestParams      = [];
        $requestPathParams  = [];
        $requestQueryParams = [];
        $requestExample     = [];
        // 获取主体参数
        array_walk($parameters, function ($value) use (&$requestPathParams, &$requestQueryParams, &$requestExample, $componentsParameters) {
            if (isset($value['$ref'])) {
                $parameters = $componentsParameters[str_replace('#/components/parameters/', '', $value['$ref'])];
            } else {
                $parameters = $value;
            }
            $required = $parameters['required'] ? '必填' : '选填';
            $example = $parameters['schema']['example'] ?? '--';
            $example = is_array($example) ? '["' . implode('","', $example) . '"]' : $example;
            if ($parameters['in'] == 'query') {
                $requestQueryParams[] = [
                    "| {$parameters['name']} | {$parameters['schema']['type']} | {$required} | {$parameters['description']} | {$example} |",
                ];
                $requestExample[] = ['key' => $parameters['name'], 'value' => $example];
            } else {
                $requestPathParams[] = [
                    "| {$parameters['name']} | {$parameters['schema']['type']} | {$required} | {$parameters['description']} | {$example} |",
                ];
            }
        });
        // 合成path参数
        if ($requestPathParams) {
            $requestParams = $this->_getRequestHeaderString('path', $requestParams, $requestPathParams);
        }
        // 合成query参数
        if ($requestQueryParams) {
            $requestParams = $this->_getRequestHeaderString('query', $requestParams, $requestQueryParams);
        }

        return ['all' => $requestParams, 'example' => $requestExample];
    }

    /**
     * @desc 合成请求头部参数
     *
     * @param $format
     * @param $params
     * @param $appendParams
     * @param null $requestExample
     *
     * @return array
     */
    private function _getRequestHeaderString($format, $params, $appendParams, $requestExample = null)
    {
        return array_merge(
            $params,
            [
                "** 请求参数，格式：{$format} **" . PHP_EOL,
                '| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |',
                '| :---: | :----: | :---: | :---: | :---: |',
            ],
            $appendParams,
            $requestExample ? [
                PHP_EOL,
                '** 请求示例 **' . PHP_EOL,
                '```json',
                json_encode($requestExample, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                '```',
            ] : [
                PHP_EOL,
            ]
        );
    }

    /**
     * @desc 合成响应参数
     *
     * @param $swaggerJsonContentArray
     * @param $response
     *
     * @return array
     */
    private function _getResponse($swaggerJsonContentArray, $response)
    {
        $responseParams = ['** 返回字段 **' . PHP_EOL];
        // 合成主体响应参数
        array_walk($response, function ($item, $key) use (&$responseParams, $swaggerJsonContentArray) {
            $statusCode = $key;
            $responseHeader = key($item['content']);
            $params = $swaggerJsonContentArray['components']['schemas'][str_replace('#/components/schemas/', '', $item['content'][$responseHeader]['schema']['$ref'])];
            // 获取响应参数和示例
            $responseExample = $this->_getFieldAndExample($params, $swaggerJsonContentArray, 'response');
            $responseParams = array_merge(
                $responseParams,
                [
                    "** {$item['description']} **" . PHP_EOL,
                    "> 状态码：{$statusCode}" . PHP_EOL,
                    "> 响应类型：{$responseHeader}" . PHP_EOL,
                    '| 返回字段 | 字段类型 | 说明 | 举例 |',
                    '| :---: | :---: | :---: | :---: |',
                ],
                $responseExample['field'],
                [
                    PHP_EOL,
                    '** 响应示例 **' . PHP_EOL,
                    '```json',
                    json_encode($responseExample['example'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                    '```',
                ]
            );
        });

        return $responseParams;
    }

    /**
     * @desc 获取响应参数个示例
     *
     * @param $params
     * @param $swaggerJsonContentArray
     * @param string $type
     * @param string $prefix
     * @param string $format
     *
     * @return mixed
     */
    private function _getFieldAndExample($params, $swaggerJsonContentArray, $type, &$prefix = '', $format = 'json')
    {
        // 处理重复拼接“*”
        $prefix = ($prefix && '\*' != substr($prefix, -2)) ? ('array' == $format ? $prefix . '.\*' : $prefix) : $prefix;
        if (isset($params['properties'])) {
            array_walk($params['properties'], function ($value, $key) use ($swaggerJsonContentArray, $prefix, $format, &$responseExample, $type, $params) {
                if (!isset($value['allOf']) && !isset($value['$ref']) && !(isset($value['items']) && isset($value['items']['$ref']))) {
                    $required = 'request' == $type ? (isset($params['required']) ? (in_array($key, $params['required']) ? '必填' : '选填') : '选填') : '';
                    $responseExample['example'][$key] = $value['example'] ?? '';
                    $example = $value['example'] ?? '--';
                    $example = is_array($example) ? '["' . implode('","', $example) . '"]' : $example;
                    $pKey = ($prefix && '.' != substr($prefix, -1, 1)) ? $prefix . '.' : $prefix;
                    $responseExample['field'][] = "| {$pKey}{$key} | {$value['type']} |" . ($required ? " {$required} |" : '') . " {$value['description']} | {$example} |";
                } else {
                    $responseExample['example'][$key] = [];
                    // 处理重复拼接“.”
                    $prefix = $prefix ? $prefix . '.' . $key : $key;
                    $tmp = $this->_getSubResponseFieldAndExample($value, $swaggerJsonContentArray, $type, $prefix, $format);
                    if ('array' == $format) {
                        $responseExample['example'][$key][] = $tmp['example'] ?? [];
                    } else {
                        $responseExample['example'][$key] = $tmp['example'] ?? [];
                    }
                    $responseExample['field'] = array_merge($responseExample['field'] ?? [], $tmp['field'] ?? []);
                }
            });

            return $responseExample;
        }

        return $this->_getSubResponseFieldAndExample($params, $swaggerJsonContentArray, $type, $prefix, $format);
    }

    /**
     * @desc 子集递归合成响应参数
     *
     * @param $params
     * @param $swaggerJsonContentArray
     * @param $type
     * @param $prefix
     * @param $format
     *
     * @return array|mixed
     */
    private function _getSubResponseFieldAndExample($params, $swaggerJsonContentArray, $type, &$prefix, &$format)
    {
        if (isset($params['allOf'])) {
            array_walk($params['allOf'], function ($value) use (&$responseFieldAndExample, $swaggerJsonContentArray, &$prefix, $format, $type) {
                $responseFieldAndExample =  array_merge_recursive($responseFieldAndExample ?: [], $this->_getFieldAndExample($value, $swaggerJsonContentArray, $type, $prefix, $format));
            });

            return $responseFieldAndExample;
        }
        if (isset($params['$ref'])) {
            $refParams = $swaggerJsonContentArray['components']['schemas'][str_replace('#/components/schemas/', '', $params['$ref'])];
            $format    = $refParams['type'] ?? 'object';

            return $this->_getFieldAndExample($refParams, $swaggerJsonContentArray, $type, $prefix, $format);
        }
        if (isset($params['items']) && isset($params['items']['$ref'])) {
            $itemsParams = $swaggerJsonContentArray['components']['schemas'][str_replace('#/components/schemas/', '', $params['items']['$ref'])];
            $format      = 'array';

            return $this->_getFieldAndExample($itemsParams, $swaggerJsonContentArray, $type, $prefix, $format);
        }

        return [];
    }
}
