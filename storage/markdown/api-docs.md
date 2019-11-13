# 开发者平台2.0接口文档

** 版本号：1.0.0 **

** 联系人电子邮箱：zhihao.wang@extremevision.com.cn **

** 描述：开发者平台2.0接口文档 **

> 基础地址：http://127.0.0.1:8000

> 支持协议：https,http

> 默认协议：http

## 用户注册短信<sup>认证</sup>

** 接口功能 **

> 用户注册短信

** 请求URL **

> /api/register-sms

** HTTP请求方式 **

> get

** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| mobile | string | 必填 | 手机号 | 13548554126 |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据集合 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 用户名或密码错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 用户注册<sup>认证</sup>

** 接口功能 **

> 用户注册

** 请求URL **

> /api/register

** HTTP请求方式 **

> post

** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| username | string | 必填 | 用户名 | admin |
| mobile | string | 必填 | 手机号 | 13114854125 |
| password | string | 必填 | 密码 | a123456. |
| verification_code | string | 必填 | 验证码 | 123456 |


** 请求示例 **

```json
{
    "username": "admin",
    "mobile": "13114854125",
    "password": "a123456.",
    "verification_code": "123456"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.username | string | 用户名 | admin |
| data.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.level | integer | 等级 | 1 |
| data.integral | integer | 积分 | 2000 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "username": "admin",
        "avatar": "/storage/avatar/test.jpg",
        "level": 1,
        "integral": 2000,
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 用户名或密码错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 用户登录<sup>认证</sup>

** 接口功能 **

> 用户登录

** 请求URL **

> /api/login

** HTTP请求方式 **

> post

** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| username | string | 必填 | 用户名 | admin |
| password | string | 必填 | 密码 | a123456. |


** 请求示例 **

```json
{
    "username": "admin",
    "password": "a123456."
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.token_info.access_token | string | 令牌 | eyJ...(hash串) |
| data.token_info.token_type | string | 令牌类型 | bearer |
| data.token_info.expires_in | integer | 有效期 | 7200 |
| data.user_info.id | integer | ID | 1 |
| data.user_info.username | string | 用户名 | admin |
| data.user_info.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.user_info.level | integer | 等级 | 1 |
| data.user_info.integral | integer | 积分 | 2000 |
| data.user_info.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.user_info.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "token_info": {
            "access_token": "eyJ...(hash串)",
            "token_type": "bearer",
            "expires_in": 7200
        },
        "user_info": {
            "id": 1,
            "username": "admin",
            "avatar": "/storage/avatar/test.jpg",
            "level": 1,
            "integral": 2000,
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    }
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 用户名或密码错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 用户信息<sup>认证</sup>

** 接口功能 **

> 用户信息

** 请求URL **

> /api/me

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.username | string | 用户名 | admin |
| data.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.level | integer | 等级 | 1 |
| data.integral | integer | 积分 | 2000 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "username": "admin",
        "avatar": "/storage/avatar/test.jpg",
        "level": 1,
        "integral": 2000,
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
## 退出登录<sup>认证</sup>

** 接口功能 **

> 退出登录

** 请求URL **

> /api/logout

** HTTP请求方式 **

> delete

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据信息 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
## 令牌刷新<sup>认证</sup>

** 接口功能 **

> 令牌刷新

** 请求URL **

> /api/refresh

** HTTP请求方式 **

> put

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.token_info.access_token | string | 令牌 | eyJ...(hash串) |
| data.token_info.token_type | string | 令牌类型 | bearer |
| data.token_info.expires_in | integer | 有效期 | 7200 |
| data.user_info.id | integer | ID | 1 |
| data.user_info.username | string | 用户名 | admin |
| data.user_info.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.user_info.level | integer | 等级 | 1 |
| data.user_info.integral | integer | 积分 | 2000 |
| data.user_info.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.user_info.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "token_info": {
            "access_token": "eyJ...(hash串)",
            "token_type": "bearer",
            "expires_in": 7200
        },
        "user_info": {
            "id": 1,
            "username": "admin",
            "avatar": "/storage/avatar/test.jpg",
            "level": 1,
            "integral": 2000,
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
## 项目分页列表<sup>项目</sup>

** 接口功能 **

> 项目分页列表

** 请求URL **

> /api/project/paginate

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| page | integer | 选填 | 当前页数 | 1 |
| per_page | integer | 必填 | 每页条数 | 1 |
| q | string | 选填 | 查询关键字 | -- |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | 安全工地：安全帽识别 |
| data.\*.status | string | 状态（registration：报名中，ing：进行中，end：已结束，iteration：迭代中） | registration |
| data.\*.purchase_budget | integer | 采购预算 | 2000 |
| data.\*.introduction | string | 简介 | 工地安全帽佩戴识别 |
| data.\*.domain | string | 领域 | 工地 |
| data.\*.research_direction | string | 研究方向 | 人脸 |
| data.\*.level | integer | 等级限制 | 1 |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |
| meta.pagination.total | integer | 总数 | 1 |
| meta.pagination.count | integer | 当前页总数 | 1 |
| meta.pagination.per_page | integer | 每页条数 | 10 |
| meta.pagination.current_page | integer | 当前页数 | 1 |
| meta.pagination.total_pages | integer | 总页数 | 1 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "安全工地：安全帽识别",
            "status": "registration",
            "purchase_budget": 2000,
            "introduction": "工地安全帽佩戴识别",
            "domain": "工地",
            "research_direction": "人脸",
            "level": 1,
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ],
    "meta": {
        "pagination": {
            "total": 1,
            "count": 1,
            "per_page": 10,
            "current_page": 1,
            "total_pages": 1
        }
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 项目详情-基本信息<sup>项目</sup>

** 接口功能 **

> 项目详情-基本信息

** 请求URL **

> /api/project/base/{project_id}

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：path **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| project_id | integer | 必填 | 项目ID | 1 |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.name | string | 名称 | 安全工地：安全帽识别 |
| data.status | string | 状态（registration：报名中，ing：进行中，end：已结束，iteration：迭代中） | registration |
| data.purchase_budget | integer | 采购预算 | 2000 |
| data.introduction | string | 简介 | 工地安全帽佩戴识别 |
| data.domain | string | 领域 | 工地 |
| data.research_direction | string | 研究方向 | 人脸 |
| data.level | integer | 等级限制 | 1 |
| data.delivery_at | string | 交付时间 | 2019-08-27 14:00:00 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "name": "安全工地：安全帽识别",
        "status": "registration",
        "purchase_budget": 2000,
        "introduction": "工地安全帽佩戴识别",
        "domain": "工地",
        "research_direction": "人脸",
        "level": 1,
        "delivery_at": "2019-08-27 14:00:00",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 用户认证详情<sup>个人中心-认证信息</sup>

** 接口功能 **

> 用户认证详情

** 请求URL **

> /api/user/authenticate

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.real_name.actual_name | string | 真实姓名 | 张三 |
| data.real_name.certificate_type_id | integer | 证件类型ID | 1 |
| data.real_name.id_number | string | 证件号码 | 412536198010250120 |
| data.real_name.authenticate_picture | string | 认证照片 | /storage/licensed-photo/test.jpg |
| data.real_name.authenticate_status | string | 认证状态 | 待审核 |
| data.real_name.authenticate_message | string | 认证消息 |  |
| data.educational_info.institution | string | 院校 | 北京大学 |
| data.educational_info.education_id | integer | 学历ID | 1 |
| data.educational_info.project_experience | string | 项目经历 | 完成河流污染识别算法 |
| data.job_info.organization | string | 组织 | 北京大学 |
| data.job_info.position_id | integer | 职位ID | 1 |
| data.job_info.domain_id | array | 领域ID | ["1","2"] |
| data.job_info.project_experience | string | 项目经历 | 完成河流污染识别算法 |
| data.award_info.\*.competition | string | 竞赛 | CV101榜单活动 |
| data.award_info.\*.award_level_id | integer | 奖项等级ID | 1 |
| data.award_info.\*.award_picture | array | 获奖照片 | ["/storage/award-picture/test.jpg","/storage/award-picture/test2.jpg"] |
| data.award_info.\*.authenticate_status | string | 认证状态 | 待审核 |
| data.award_info.\*.authenticate_message | string | 认证消息 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "real_name": {
            "actual_name": "张三",
            "certificate_type_id": 1,
            "id_number": "412536198010250120",
            "authenticate_picture": "/storage/licensed-photo/test.jpg",
            "authenticate_status": "待审核",
            "authenticate_message": ""
        },
        "educational_info": {
            "institution": "北京大学",
            "education_id": 1,
            "project_experience": "完成河流污染识别算法"
        },
        "job_info": {
            "organization": "北京大学",
            "position_id": 1,
            "domain_id": [
                1,
                2
            ],
            "project_experience": "完成河流污染识别算法"
        },
        "award_info": [
            {
                "competition": "CV101榜单活动",
                "award_level_id": 1,
                "award_picture": [
                    "/storage/award-picture/test.jpg",
                    "/storage/award-picture/test2.jpg"
                ],
                "authenticate_status": "待审核",
                "authenticate_message": ""
            }
        ]
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 证件类型列表<sup>个人中心-认证信息</sup>

** 接口功能 **

> 证件类型列表

** 请求URL **

> /api/user/authenticate/certificate-type

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 领域列表<sup>个人中心-认证信息</sup>

** 接口功能 **

> 领域列表

** 请求URL **

> /api/user/authenticate/domain

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 学历列表<sup>个人中心-认证信息</sup>

** 接口功能 **

> 学历列表

** 请求URL **

> /api/user/authenticate/education

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 职位列表<sup>个人中心-认证信息</sup>

** 接口功能 **

> 职位列表

** 请求URL **

> /api/user/authenticate/position

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 奖项等级列表<sup>个人中心-认证信息</sup>

** 接口功能 **

> 奖项等级列表

** 请求URL **

> /api/user/authenticate/award-level

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 上传持证照片<sup>个人中心-认证信息</sup>

** 接口功能 **

> 上传持证照片

** 请求URL **

> /api/user/authenticate/upload/licensed-photo

** HTTP请求方式 **

> post

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：form-data

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| file | file | 必填 | 文件 | （二进制文件流） |


** 请求示例 **

```json
{
    "file": "（二进制文件流）"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.name | string | 文件名 | test.jpg |
| data.type | string | 类型 | avatar |
| data.path | string | 路径 | /storage/avatar/test.jpg |
| data.size | integer | 文件大小（KB） | 200 |
| data.request_ip | string | 请求IP | 127.0.0.1 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "name": "test.jpg",
        "type": "avatar",
        "path": "/storage/avatar/test.jpg",
        "size": 200,
        "request_ip": "127.0.0.1",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 系统错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 更新实名认证<sup>个人中心-认证信息</sup>

** 接口功能 **

> 更新实名认证

** 请求URL **

> /api/user/authenticate/real-name

** HTTP请求方式 **

> put

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| actual_name | string | 必填 | 真实姓名 | 张三 |
| certificate_type_id | integer | 必填 | 证件类型ID | 1 |
| id_number | string | 必填 | 证件号码 | 412536198010250120 |
| authenticate_picture | string | 必填 | 认证照片 | /storage/licensed-photo/test.jpg |


** 请求示例 **

```json
{
    "actual_name": "张三",
    "certificate_type_id": 1,
    "id_number": "412536198010250120",
    "authenticate_picture": "/storage/licensed-photo/test.jpg"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.actual_name | string | 真实姓名 | 张三 |
| data.certificate_type_id | integer | 证件类型ID | 1 |
| data.id_number | string | 证件号码 | 412536198010250120 |
| data.authenticate_picture | string | 认证照片 | /storage/licensed-photo/test.jpg |
| data.authenticate_status | string | 认证状态 | 待审核 |
| data.authenticate_message | string | 认证消息 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "actual_name": "张三",
        "certificate_type_id": 1,
        "id_number": "412536198010250120",
        "authenticate_picture": "/storage/licensed-photo/test.jpg",
        "authenticate_status": "待审核",
        "authenticate_message": ""
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新教育信息<sup>个人中心-认证信息</sup>

** 接口功能 **

> 更新教育信息

** 请求URL **

> /api/user/authenticate/educational-info

** HTTP请求方式 **

> put

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| institution | string | 必填 | 院校 | 北京大学 |
| education_id | integer | 必填 | 学历ID | 1 |
| project_experience | string | 必填 | 项目经历 | 完成河流污染识别算法 |


** 请求示例 **

```json
{
    "institution": "北京大学",
    "education_id": 1,
    "project_experience": "完成河流污染识别算法"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.institution | string | 院校 | 北京大学 |
| data.education_id | integer | 学历ID | 1 |
| data.project_experience | string | 项目经历 | 完成河流污染识别算法 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "institution": "北京大学",
        "education_id": 1,
        "project_experience": "完成河流污染识别算法"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新职业信息<sup>个人中心-认证信息</sup>

** 接口功能 **

> 更新职业信息

** 请求URL **

> /api/user/authenticate/job-info

** HTTP请求方式 **

> put

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| organization | string | 必填 | 组织 | 北京大学 |
| position_id | integer | 必填 | 职位ID | 1 |
| domain_id | array | 必填 | 领域ID | ["1","2"] |
| project_experience | string | 必填 | 项目经历 | 完成河流污染识别算法 |


** 请求示例 **

```json
{
    "organization": "北京大学",
    "position_id": 1,
    "domain_id": [
        1,
        2
    ],
    "project_experience": "完成河流污染识别算法"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.organization | string | 组织 | 北京大学 |
| data.position_id | integer | 职位ID | 1 |
| data.domain_id | array | 领域ID | ["1","2"] |
| data.project_experience | string | 项目经历 | 完成河流污染识别算法 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "organization": "北京大学",
        "position_id": 1,
        "domain_id": [
            1,
            2
        ],
        "project_experience": "完成河流污染识别算法"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 上传奖项认证照片<sup>个人中心-认证信息</sup>

** 接口功能 **

> 上传奖项认证照片

** 请求URL **

> /api/user/authenticate/upload/award-prove

** HTTP请求方式 **

> post

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：form-data

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| file | file | 必填 | 文件 | （二进制文件流） |


** 请求示例 **

```json
{
    "file": "（二进制文件流）"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.name | string | 文件名 | test.jpg |
| data.type | string | 类型 | avatar |
| data.path | string | 路径 | /storage/avatar/test.jpg |
| data.size | integer | 文件大小（KB） | 200 |
| data.request_ip | string | 请求IP | 127.0.0.1 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "name": "test.jpg",
        "type": "avatar",
        "path": "/storage/avatar/test.jpg",
        "size": 200,
        "request_ip": "127.0.0.1",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 系统错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 新增奖项信息<sup>个人中心-认证信息</sup>

** 接口功能 **

> 新增奖项信息

** 请求URL **

> /api/user/authenticate/award-info

** HTTP请求方式 **

> post

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| competition | string | 必填 | 竞赛 | CV101榜单活动 |
| award_level_id | integer | 必填 | 奖项等级ID | 1 |
| award_picture | array | 必填 | 获奖照片 | ["/storage/award-picture/test.jpg","/storage/award-picture/test2.jpg"] |


** 请求示例 **

```json
{
    "competition": "CV101榜单活动",
    "award_level_id": 1,
    "award_picture": [
        "/storage/award-picture/test.jpg",
        "/storage/award-picture/test2.jpg"
    ]
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.competition | string | 竞赛 | CV101榜单活动 |
| data.award_level_id | integer | 奖项等级ID | 1 |
| data.award_picture | array | 获奖照片 | ["/storage/award-picture/test.jpg","/storage/award-picture/test2.jpg"] |
| data.authenticate_status | string | 认证状态 | 待审核 |
| data.authenticate_message | string | 认证消息 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "competition": "CV101榜单活动",
        "award_level_id": 1,
        "award_picture": [
            "/storage/award-picture/test.jpg",
            "/storage/award-picture/test2.jpg"
        ],
        "authenticate_status": "待审核",
        "authenticate_message": ""
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 用户基本详情<sup>个人中心-基本信息</sup>

** 接口功能 **

> 用户基本详情

** 请求URL **

> /api/user/base

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.username | string | 用户名 | test |
| data.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.province | string | 省 | 广东省 |
| data.city | string | 市 | 深圳市 |
| data.county | string | 县 | 南山区 |
| data.is_overseas | integer | 是否海外 | 0 |
| data.research_direction_id | array | 研究方向ID | ["1","2"] |
| data.mobile | string | 手机号 | 13545621354 |
| data.email | string | 邮箱 | 123456@qq.com |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "username": "test",
        "avatar": "/storage/avatar/test.jpg",
        "province": "广东省",
        "city": "深圳市",
        "county": "南山区",
        "is_overseas": 0,
        "research_direction_id": [
            1,
            2
        ],
        "mobile": "13545621354",
        "email": "123456@qq.com",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新用户基本详情<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新用户基本详情

** 请求URL **

> /api/user/base

** HTTP请求方式 **

> put

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| avatar | string | 必填 | 头像 | /storage/avatar/test.jpg |
| province | string | 选填 | 省（不是海外必填） | 广东省 |
| city | string | 选填 | 市（不是海外必填） | 深圳市 |
| county | string | 选填 | 县（不是海外必填） | 南山区 |
| is_overseas | integer | 必填 | 是否海外（0：不是，1：是） | 0 |
| research_direction_id | array | 必填 | 研究方向ID | ["1","2"] |


** 请求示例 **

```json
{
    "avatar": "/storage/avatar/test.jpg",
    "province": "广东省",
    "city": "深圳市",
    "county": "南山区",
    "is_overseas": 0,
    "research_direction_id": [
        1,
        2
    ]
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.username | string | 用户名 | test |
| data.avatar | string | 头像 | /storage/avatar/test.jpg |
| data.province | string | 省 | 广东省 |
| data.city | string | 市 | 深圳市 |
| data.county | string | 县 | 南山区 |
| data.is_overseas | integer | 是否海外 | 0 |
| data.research_direction_id | array | 研究方向ID | ["1","2"] |
| data.mobile | string | 手机号 | 13545621354 |
| data.email | string | 邮箱 | 123456@qq.com |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "username": "test",
        "avatar": "/storage/avatar/test.jpg",
        "province": "广东省",
        "city": "深圳市",
        "county": "南山区",
        "is_overseas": 0,
        "research_direction_id": [
            1,
            2
        ],
        "mobile": "13545621354",
        "email": "123456@qq.com",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 头像上传<sup>个人中心-基本信息</sup>

** 接口功能 **

> 头像上传

** 请求URL **

> /api/user/base/upload/avatar

** HTTP请求方式 **

> post

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：form-data

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| file | file | 必填 | 文件 | （二进制文件流） |


** 请求示例 **

```json
{
    "file": "（二进制文件流）"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.name | string | 文件名 | test.jpg |
| data.type | string | 类型 | avatar |
| data.path | string | 路径 | /storage/avatar/test.jpg |
| data.size | integer | 文件大小（KB） | 200 |
| data.request_ip | string | 请求IP | 127.0.0.1 |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "name": "test.jpg",
        "type": "avatar",
        "path": "/storage/avatar/test.jpg",
        "size": 200,
        "request_ip": "127.0.0.1",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00"
    }
}
```
** 参数格式有误,校验失败 **

> 状态码：422

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 422 |
| message | string | 错误信息 | 字段必须 |


** 响应示例 **

```json
{
    "status_code": 422,
    "message": "字段必须"
}
```
** 系统错误 **

> 状态码：500

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 500 |
| message | string | 错误信息 | 数据有误 |


** 响应示例 **

```json
{
    "status_code": 500,
    "message": "数据有误"
}
```
## 研究方向列表<sup>个人中心-基本信息</sup>

** 接口功能 **

> 研究方向列表

** 请求URL **

> /api/user/base/research-direction

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | test |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "test",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新手机号-获取旧手机号验证码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新手机号-获取旧手机号验证码

** 请求URL **

> /api/user/base/update-mobile/old-mobile-verification-code

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.verification_code | string | 验证码 | 12345 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "verification_code": "12345"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新手机号-获取旧邮箱验证码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新手机号-获取旧邮箱验证码

** 请求URL **

> /api/user/base/update-mobile/old-email-verification-code

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| email | string | 必填 | 邮箱 | 123456@qq.com |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.verification_code | string | 验证码 | 12345 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "verification_code": "12345"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新手机号-获取新手机号验证码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新手机号-获取新手机号验证码

** 请求URL **

> /api/user/base/update-mobile/new-mobile-verification-code

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| mobile | string | 必填 | 手机号 | 13548554126 |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.verification_code | string | 验证码 | 12345 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "verification_code": "12345"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 绑定邮箱-获取绑定邮箱验证码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 绑定邮箱-获取绑定邮箱验证码

** 请求URL **

> /api/user/base/bind-email/verification-code

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| email | string | 必填 | 邮箱 | 123456@qq.com |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.verification_code | string | 验证码 | 12345 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "verification_code": "12345"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新邮箱-获取旧邮箱验证码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新邮箱-获取旧邮箱验证码

** 请求URL **

> /api/user/base/update-email/old-email-verification-code

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求参数，格式：query **

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| email | string | 必填 | 邮箱 | 123456@qq.com |


** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.verification_code | string | 验证码 | 12345 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "verification_code": "12345"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 绑定邮箱<sup>个人中心-基本信息</sup>

** 接口功能 **

> 绑定邮箱

** 请求URL **

> /api/user/base/bind-email

** HTTP请求方式 **

> post

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| email | string | 必填 | 邮箱 | 123456@qq.com |
| verification_code | string | 必填 | 验证码 | 12345 |


** 请求示例 **

```json
{
    "email": "123456@qq.com",
    "verification_code": "12345"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据集合 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新手机号<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新手机号

** 请求URL **

> /api/user/base/update-mobile

** HTTP请求方式 **

> patch

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| authentication_type | string | 必填 | 验证类型 | mobile |
| old_mobile_verification_code | string | 选填 | 旧手机号验证码（验证类型为‘mobile’必须） | 12345 |
| old_email_verification_code | string | 选填 | 邮箱验证码（验证类型为‘email’必须） | 12345 |
| new_mobile | string | 必填 | 新手机号 | 13545874587 |
| new_mobile_verification_code | string | 必填 | 新手机号验证码 | 12345 |


** 请求示例 **

```json
{
    "authentication_type": "mobile",
    "old_mobile_verification_code": "12345",
    "old_email_verification_code": "12345",
    "new_mobile": "13545874587",
    "new_mobile_verification_code": "12345"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据集合 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新邮箱<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新邮箱

** 请求URL **

> /api/user/base/update-email

** HTTP请求方式 **

> patch

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| old_email_verification_code | string | 必填 | 旧邮箱验证码 | 12345 |
| old_email | string | 必填 | 旧邮箱 | 123456@qq.com |
| new_email | string | 必填 | 新邮箱 | 111111@qq.com |


** 请求示例 **

```json
{
    "old_email_verification_code": "12345",
    "old_email": "123456@qq.com",
    "new_email": "111111@qq.com"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据集合 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 更新密码<sup>个人中心-基本信息</sup>

** 接口功能 **

> 更新密码

** 请求URL **

> /api/user/base/update-password

** HTTP请求方式 **

> patch

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 请求字段 **

> 请求类型：application/json

| 请求字段 | 字段类型 | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| old_password | string | 必填 | 旧密码 | 123456Qq |
| new_password | string | 必填 | 新密码 | 123456Aa |


** 请求示例 **

```json
{
    "old_password": "123456Qq",
    "new_password": "123456Aa"
}
```
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data | string | 数据集合 |  |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": ""
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 等级积分详情<sup>个人中心-等级积分</sup>

** 接口功能 **

> 等级积分详情

** 请求URL **

> /api/user/level-credit

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.id | integer | ID | 1 |
| data.level | integer | 等级 | 1 |
| data.integral | integer | 积分 | 200 |
| data.general_integral | integer | 通用积分 | 200 |
| data.dedicated_integral | integer | 专用积分 | 0 |
| data.gpu_available_time | string | GPU可用时长 | 200min |
| data.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |
| data.upgrade_condition.experience | integer | 升级所需经验 | 1200 |
| data.upgrade_condition.business_algorithm | integer | 升级所需商业算法个数 | 0 |
| data.upgrade_condition.algorithm_type | integer | 升级所需算法类型个数 | 0 |
| data.upgrade_condition.project | integer | 升级所需项目个数 | 1 |
| data.upgrade_condition.current_experience | integer | 当前经验 | 0 |
| data.upgrade_condition.current_business_algorithm | integer | 当前商业算法个数 | 0 |
| data.upgrade_condition.current_algorithm_type | integer | 当前算法类型个数 | 0 |
| data.upgrade_condition.current_project | integer | 当前项目个数 | 0 |
| data.integral_record.\*.change | integer | 变化值 | 100 |
| data.integral_record.\*.is_positive_growth | integer | 是否正增长（0：否，1：是） | 0 |
| data.integral_record.\*.message | string | 消息 | 完成注册获取积分 |
| data.integral_record.\*.created_at | string | 时间 | 2019-11-08 17:16:40 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": {
        "id": 1,
        "level": 1,
        "integral": 200,
        "general_integral": 200,
        "dedicated_integral": 0,
        "gpu_available_time": "200min",
        "created_at": "2019-08-27 14:00:00",
        "updated_at": "2019-08-27 14:00:00",
        "upgrade_condition": {
            "experience": 1200,
            "business_algorithm": 0,
            "algorithm_type": 0,
            "project": 1,
            "current_experience": 0,
            "current_business_algorithm": 0,
            "current_algorithm_type": 0,
            "current_project": 0
        },
        "integral_record": [
            {
                "change": 100,
                "is_positive_growth": 0,
                "message": "完成注册获取积分",
                "created_at": "2019-11-08 17:16:40"
            }
        ]
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 镜像管理列表<sup>个人中心-镜像管理</sup>

** 接口功能 **

> 镜像管理列表

** 请求URL **

> /api/user/mirror

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | tensorflow基础镜像 |
| data.\*.tag | string | 标签 | 1.0.0 |
| data.\*.size | string | 大小 | 20.5 |
| data.\*.remark | string | 备注 | tensorflow基础镜像安装基础扩展 |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |
| meta.free_mirror_space | integer | 免费镜像空间 | 100 |
| meta.surplus_mirror_space | string | 剩余镜像空间 | 50.5 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "tensorflow基础镜像",
            "tag": "1.0.0",
            "size": "20.5",
            "remark": "tensorflow基础镜像安装基础扩展",
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00"
        }
    ],
    "meta": {
        "free_mirror_space": 100,
        "surplus_mirror_space": "50.5"
    }
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```
## 参与项目列表<sup>个人中心-参与项目</sup>

** 接口功能 **

> 参与项目列表

** 请求URL **

> /api/user/participate-project

** HTTP请求方式 **

> get

** 请求头部 **

| 请求字段 |  字段类型  | 是否必须 | 说明 | 举例 |
| :---: | :----: | :---: | :---: | :---: |
| Authorization | string | 是 | 鉴权 | Bearer eyJ0eXAiO...(Hash串) |
** 返回字段 **

** 请求成功 **

> 状态码：200

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 200 |
| message | string | 成功信息 | 操作成功 |
| data.\*.id | integer | ID | 1 |
| data.\*.name | string | 名称 | 安全工地：安全帽识别 |
| data.\*.status | string | 状态（registration：报名中，ing：进行中，end：已结束，iteration：迭代中） | registration |
| data.\*.purchase_budget | integer | 采购预算 | 2000 |
| data.\*.introduction | string | 简介 | 工地安全帽佩戴识别 |
| data.\*.domain | string | 领域 | 工地 |
| data.\*.research_direction | string | 研究方向 | 人脸 |
| data.\*.level | integer | 等级限制 | 1 |
| data.\*.created_at | string | 创建时间 | 2019-08-27 14:00:00 |
| data.\*.updated_at | string | 更新时间 | 2019-08-27 14:00:00 |
| data.\*.instance.id | integer | ID | 1 |
| data.\*.instance.name | string | 名称 | 安全帽识别 |
| data.\*.instance.gpu | integer | GPU | 2 |
| data.\*.instance.cpu | integer | CPU | 2 |
| data.\*.instance.ram | integer | 内存 | 2 |
| data.\*.instance.time_consuming | string | 耗时 | 2h30min |
| data.\*.instance.consumption_points | integer | 消耗积分 | 1200 |
| data.\*.instance.status | creating | 状态（creating：创建中，coding：编码中，training：训练中，training_completed：训练完成，testing：测试中，finished_test：测试完成，project_deadline：项目截止，stop：停用） | creating |
| data.\*.instance.created_at | string | 创建时间 | 2019-08-27 14:00:00 |


** 响应示例 **

```json
{
    "status_code": 200,
    "message": "操作成功",
    "data": [
        {
            "id": 1,
            "name": "安全工地：安全帽识别",
            "status": "registration",
            "purchase_budget": 2000,
            "introduction": "工地安全帽佩戴识别",
            "domain": "工地",
            "research_direction": "人脸",
            "level": 1,
            "created_at": "2019-08-27 14:00:00",
            "updated_at": "2019-08-27 14:00:00",
            "instance": {
                "id": 1,
                "name": "安全帽识别",
                "gpu": 2,
                "cpu": 2,
                "ram": 2,
                "time_consuming": "2h30min",
                "consumption_points": 1200,
                "status": "creating",
                "created_at": "2019-08-27 14:00:00"
            }
        }
    ]
}
```
** 令牌认证失败 **

> 状态码：401

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 401 |
| message | string | 错误信息 | 令牌认证失败 |


** 响应示例 **

```json
{
    "status_code": 401,
    "message": "令牌认证失败"
}
```
** 查询数据不存在 **

> 状态码：404

> 响应类型：application/json

| 返回字段 | 字段类型 | 说明 | 举例 |
| :---: | :---: | :---: | :---: |
| status_code | integer | 状态码 | 404 |
| message | string | 错误信息 | 查询数据不存在 |


** 响应示例 **

```json
{
    "status_code": 404,
    "message": "查询数据不存在"
}
```