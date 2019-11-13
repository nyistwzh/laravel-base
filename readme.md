# 关于项目

## 项目介绍

> laravel项目开发基本架构

## 开发语言

| 语言 |
| :---: |
| PHP |

## 开发框架

| 框架 | 版本 |
| :---: | :---: |
| Laravel Framework | 5.8.35 |

## 项目运行环境

| 环境 | 说明 |
| :---: | :---: |
| Linux | 推荐`centos6+`，`ubuntu14+` |
| PHP | `>=7.1.3` ，推荐`PHP7.2+` |
| Nginx | `>=1.16.1` |
| Mysql | `5.7`，不推荐`8.0+` |
| Redis | `5.0.5` 服务端，切勿装redis的php扩展，本项目采用predis作为扩展 |

## 项目架构

```
┌── app                              # 核心代码目录
│   ├── Console                      # 控制台
│   │   ├── Commands                 # 自定义命令
│   │   └── Kernel.php               # 计划任务调度
│   ├── Enum                         # 枚举变量以及字符串常量
│   ├── Events                       # 事件
│   ├── Exceptions                   # 异常处理
│   ├── ├── CustomException.php      # 自定义错误异常抛出
│   │   └── Handler.php              # 处理报错信息
│   ├── Http                         # HTTP请求接收层
│   │   ├── Controllers              # 控制器（处理参数接受）     
│   │   │   ├── Api                  # API请求（对应routes/api.php）
│   │   │   └── Web                  # Web请求（对应routes/web.php）
│   │   ├── Middleware               # 中间件
│   │   │   ├── CheckPermission.php  # Rbac权限校验
│   │   │   ├── InterfaceStyle.php   # 不同风格接口返回值重定义
│   │   │   └── RefreshToken.php     # Token无痛刷新
│   │   ├── helpers.php              # 自定义的全局函数
│   │   └── Kernel.php               # 自定义中间件注册及别名
│   ├── Imports                      # Excel导入
│   ├── Jobs                         # 计划任务
│   ├── Listeners                    # 监听任务
│   ├── Models                       # 模型
│   ├── Observers                    # 观察器
│   ├── Providers                    # 服务提供注册
│   │   ├── AppServiceProvider.php   # 注册观察器
│   │   └── EventServiceProvider.php # 注册监听事件
│   ├── Repository                   # 仓库（数据交互）
│   ├── Requests                     # 请求校验
│   │   └── Api                      # API参数校验
│   ├── Services                     # 服务（处理业务逻辑）
│   ├── Traits                       # 常用函数封装（非全局函数）
│   ├── Transformers                 # 响应过滤
│   └── Utils                        # 工具包（工具类）
├── sbin                             # 系统级脚本
│   ├── init                         # 项目初始化
├── config                           # 配置文件
├── database                         # 数据库相关
│   ├── migrations                   # 迁移文件（数据表生成文件）
│   └── seeds                        # 数据填充（常用来做项目初始化数据填充）
├── routes                           # 单元测试目录
│   ├── api.php                      # api请求的路由文件
│   └── web.php                      # web请求的路由文件
├── storage                          # 存储
│   │   ├── api-docs                 # swagger文档
│   │   │   ├── api-docs.json        # swagger文档json
│   │   ├── markdown                 # markdown文档
│   │   │   ├── api-docs.json        # markdown文档md
│   │   ├── postman                  # postman文档
│   │   │   └── api-docs.json        # postman文档json
└── tests                            # 单元测试
```

## 项目运行

### 部署项目
```
cd /data/wwwroot                                                              # 切换到任意项目目录 (/data/wwwroot为项目部署目录)
git clone git@git.extremevision.com.cn:ExtremeVision/yunda_express_burst.git  # 克隆项目
cd yunda_express_burst                                                        # 进入项目目录
cp .env.example .env                                                          # 拷贝环境变量配置文件
vim .env                                                                      # 根据当前环境配置数据库，Redis，访问地址，前端访问地址等信息
./bin/init                                                                    # 初始化项目信息
```

## nginx配置

> 可参考以下配置文件配置，'/data/wwwroot/yunda_express_burst'为项目路径

```
server {
  listen 80;
  access_log /data/wwwlogs/yunda_express_burst_nginx.log combined;
  index index.html index.htm index.php;
  root /data/wwwroot/yunda_express_burst/public;
  
  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }

  #error_page 404 /404.html;
  #error_page 502 /502.html;

  location ~ [^/]\.php(/|$) {
    #fastcgi_pass remote_php_ip:9000;
    fastcgi_pass unix:/dev/shm/php-cgi.sock;
    fastcgi_index index.php;
    include fastcgi.conf;
  }

  location ~ .*\.(gif|jpg|jpeg|png|bmp|swf|flv|mp4|ico)$ {
    expires 30d;
    access_log off;
  }

  location ~ .*\.(js|css)?$ {
    try_files $uri /index.php;
    expires 7d;
    access_log off;
  }

  location ~ .*\.(json|md)?$ {
    try_files $uri /index.php;
  }

  location ~ /\.ht {
    deny all;
  }
}
```

### 配置守护进程

> '/var/www/yunda_express_burst' 均为项目目录，具体配置可参考[supervisord配置](http://www.supervisord.org/configuration.html)

**参考配置如下：**

```
[program:express_queue]
command=php /var/www/yunda_express_burst/artisan queue:work redis --sleep=3 --tries=1
autostart=true
autorestart=true
user=root
redirect_stderr=true
stdout_logfile=/var/www/yunda_express_burst/storage/logs/queue.log
stdout_logfile_maxbytes=8MB
stdout_logfile_backups=10
```

## 文档说明

**非生产环境可访问（即.env中的APP_ENV不等于production），'http://127.0.0.1:8000'为项目地址**

>swagger接口文档地址：[http://127.0.0.1:8000/swagger](http://127.0.0.1:8000/swagger)

>html接口文档地址：[http://127.0.0.1:8000/doc](http://127.0.0.1:8000/doc)

>md接口文档地址：[http://127.0.0.1:8000/md](http://127.0.0.1:8000/md)

>postman接口Json地址：[http://127.0.0.1:8000/postman](http://127.0.0.1:8000/postman)
