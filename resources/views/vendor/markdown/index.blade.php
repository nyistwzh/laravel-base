<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="{{ URL::asset('css/preview.css') }}"/>
    <title>{{config('app.name')}}接口文档</title>
</head>
<body>
<a target="_blank" href="/swagger" class="box swagger"><div class="icon"></div><div class="front-box"><p>swagger</p></div></a>
<a target="_blank" href="/md" class="box markdown"><div class="icon"></div><div class="front-box"><p>markdown文档导出</p></div></a>
<a target="_blank" href="/postman" class="box postman"><div class="icon"></div><div class="front-box"><p>postman接口导出</p></div></a>
<div class="book without-animation with-summary font-size-2 font-family-1">
    <div class="book-summary">
        <nav role="navigation">
        </nav>
    </div>
    <div class="book-body">
        <div class="page-inner">
            <div class="markdown-section">
                <h1>文档首页</h1>
            </div>
        </div>
        <a href="#" class="navigation navigation-prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#" class="navigation navigation-next" style="margin-right: 17px;">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<div class="preview">
    {!! $content !!}
</div>
<div class="template">
    <ul class="summary summary-tag icon-arrow-normal">
        <li class="chapter chapter-tag">
            <a class="tag" href="javascript:void(0);">
                主页
            </a>
            <ul class="summary summary-title">
                <li class="chapter chapter-title">
                    <a class="title title-normal" href="javascript:void(0);">
                        主页
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/clipboard.js/2.0.4/clipboard.min.js"></script>
<script src="{{ URL::asset('js/preview.js') }}"></script>
</html>
