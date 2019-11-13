<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

return [
    /*
     * 文件上传配置文件
     * way: 上传方式：qiniuCloud，local
     * local_name：local的名称
     * mimetypes：配置文件MIME类型，此类型会在上传文件中进行检测（必配）
     *            例如：图片（image/jpeg,image/png,image/jpg）
     *                  视频（video/mp4,video/webm,video/ogg）
     * type：配置文件类型，此类型会在上传文件中进行检测（必配）
     *       例如：图片（image）
     *             视频（video）
     * width：配置文件上传后的宽度，此参数用于图片上传处理后的宽度，不填表示不处理（选配）
     *        大于1：表示px
     *        小于1：表示比率
     * height：配置文件上传后的高度，此参数用于图片上传处理后的高度，不填表示不处理（选配）
     *        大于1：表示px
     *        小于1：表示比率
     * limit:文件大小限制（单位：KB）
     * 注意：宽高只配置一个表示按配置的进行等比缩放
     */
    'original' => [
        'way'       => 'local',
        'mimetypes' => 'image/jpeg,image/png,image/jpg',
        'type'      => 'image',
        'desc'      => '原图',
    ],
    'avatar' => [
        'way'       => 'local',
        'mimetypes' => 'image/jpeg,image/png,image/jpg',
        'type'      => 'image',
        'desc'      => '头像',
        'width'     => 300,
        'height'    => 300,
        'limit'     => 2048,
    ],
    'licensed_photo' => [
        'way'       => 'local',
        'mimetypes' => 'image/jpeg,image/png,image/jpg',
        'type'      => 'image',
        'desc'      => '手持证件照',
        'limit'     => 2048,
    ],
    'award_prove' => [
        'way'       => 'local',
        'mimetypes' => 'image/jpeg,image/png,image/jpg',
        'type'      => 'image',
        'desc'      => '奖项认证照片',
        'limit'     => 2048,
    ],
];
