<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => ':attribute必须是一个数组。',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute必须是有效的电子邮件地址。',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => '所选的:attribute无效。',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => '所选的:attribute无效。',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute必须为整数。',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute不能大于:max。',
        'file' => ':attribute不能大于:maxKB。',
        'string' => ':attribute不能大于:max字符。',
        'array' => ':attribute不能超过:max个项目。',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => ':attribute必须是类型：:values的文件。',
    'min' => [
        'numeric' => ':attribute必须至少为:min。',
        'file' => ':attribute必须至少为:minKB。',
        'string' => ':attribute必须至少为:min字符。',
        'array' => ':attribute必须至少包含:min个项目。',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => ':attribute字段是必填字段。',
    'required_if' => '当:other是:value时，:attribute字段是必需的。',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => ':attribute必须为:size。',
        'file' => ':attribute必须为:sizeKB。',
        'string' => ':attribute必须为:size字符。',
        'array' => ':attribute必须包含:size项。',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ':attribute必须是字符串。',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute已经被使用。',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'username' => [
            'login_username' => ':attribute格式错误',
            'username' => ':attribute格式错误',
        ],
        'mobile' => [
            'mobile' => ':attribute格式错误',
        ],
        'avatar' => [
            'local_image' => ':attribute文件找不到',
        ],
        'id_number' => [
            'id_number' => ':attribute格式错误',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'page' => '当前页码',
        'per_page' => '每页条数',
        'q' => '关键字',
        'order' => '排序字段',
        'username' => '用户名',
        'password' => '密码',
        'mobile' => '手机号',
        'verification_code' => '验证码',
        'avatar' => '头像',
        'email' => '邮箱',
        'actual_name' => '真实姓名',
        'certificate_type_id' => '证件类型ID',
        'id_number' => '证件号码',
        'authenticate_picture' => '认证照片',
        'institution' => '院校',
        'education_id' => '学历ID',
        'project_experience' => '项目经历',
        'organization' => '组织',
        'position_id' => '职位ID',
        'domain_id' => '领域ID',
        'competition' => '竞赛',
        'award_level_id' => '奖项等级ID',
        'award_picture' => '奖项图片',
    ],

];
