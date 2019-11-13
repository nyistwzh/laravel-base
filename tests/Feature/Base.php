<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Base extends TestCase
{

    use DatabaseTransactions;

    const BASE_STRUCTURE = [
        'status_code', 'message'
    ];

    const VERIFY_ERROR = [
        'status_code' => '422'
    ];

    const SYSTEM_ERROR = [
        'status_code' => '500'
    ];

    const PAGINATE_STRUCTURE = [
        "meta" => [
            "pagination" => [
                "total", "count", "per_page", "current_page" , "total_pages"
            ]
        ],
    ];

    const LOGIN_SUCCESS_STRUCTURE = [
        "data" => [
            "token_info" => [
                "access_token",
                "expires_in",
                "token_type",
            ],
            "user_info" => [
                "id",
                "username",
                "avatar",
                "level",
                "integral",
                "created_at",
                "updated_at"
            ]
        ]
    ];

    const FILE_SUCCESS_STRUCTURE = [
        "data" => [
            "name",
            "type",
            "path",
            "size",
            "request_ip",
            "created_at",
            "updated_at"
        ]
    ];

    const GENERAL_SUCCESS_STRUCTURE = [
        "data" => [
            '*' => [
                "id",
                "name",
                "order",
                "created_at",
                "updated_at"
            ]
        ]
    ];

    const DEFAULT_REQUEST_HEADER_FORMAT = ['application/json'];
    const DEFAULT_METHOD = 'get';

    protected function AuthAuthorization()
    {
        $route = '/api/login';
        $method = 'post';
        $requestData = [
            'username' => 'a123456',
            'password' => 'a123456.',
        ];
        $structure = array_merge(self::BASE_STRUCTURE, self::LOGIN_SUCCESS_STRUCTURE);
        $response = $this->baseRequest($route, $requestData, $structure, $method);

        return json_decode($response->getContent(), true)['data']['token_info']['access_token'];
    }

    protected function getHeader($token)
    {
        return ['Authorization' => 'Bearer ' . $token];
    }

    protected function baseAuthRequest($route, $requestData, $structure, $method = self::DEFAULT_METHOD, $requestHeaderFormat = self::DEFAULT_REQUEST_HEADER_FORMAT)
    {
        $header = $this->getHeader($this->AuthAuthorization());
        return $this->withHeaders($header)
            ->{$method}($route, $requestData, $requestHeaderFormat)
            ->assertSuccessful()
            ->assertJsonStructure($structure);
    }

    protected function baseRequest($route, $requestData, $structure, $method = self::DEFAULT_METHOD, $requestHeaderFormat = self::DEFAULT_REQUEST_HEADER_FORMAT)
    {
        return $this->{$method}($route, $requestData, $requestHeaderFormat)
            ->assertSuccessful()
            ->assertJsonStructure($structure);
    }

    protected function baseVerifyError($route, $requestData, $method = self::DEFAULT_METHOD, $requestHeaderFormat = self::DEFAULT_REQUEST_HEADER_FORMAT)
    {
        $this->baseRequest($route, $requestData, $method, self::BASE_STRUCTURE, $requestHeaderFormat)
            ->assertJsonFragment(self::VERIFY_ERROR);
    }

    protected function baseSystemError($route, $requestData, $method = self::DEFAULT_METHOD, $requestHeaderFormat = self::DEFAULT_REQUEST_HEADER_FORMAT)
    {
        $this->baseRequest($route, $requestData, $method, self::BASE_STRUCTURE, $requestHeaderFormat)
            ->assertJsonFragment(self::SYSTEM_ERROR);
    }
}
