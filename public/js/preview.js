$(document).ready(function(){
    // 便签按钮操作
    $(".box").hover(function () {
        $(this).find('.front-box').stop().animate({width:'toggle'},350);
    },function(){
        $(this).find('.front-box').stop().animate({width:'toggle'},350);
    });
    // 处理文档分理处菜单和文档
    let h2 = $('.preview').children('h2');
    let docs = new Array();
    let list = new Array();
    let jsonStructure = new Array();
    let index = 0;
    $('.navigation-prev').hide();
    for (var i =0; i < h2.length; i++) {
        let eH2 = $('.preview h2').eq(i);
        let allTitle = eH2.clone();
        let tag = allTitle.find('sup').html();
        allTitle.find(':nth-child(n)').remove();
        let title = allTitle.html();
        if (list.hasOwnProperty(tag)) {
            list[tag].push({'title': title, 'index': i});
        } else {
            list[tag] = [{'title': title, 'index': i}];
        }
        eH2.find(':nth-child(n)').remove();
        let currentDoc = eH2.nextUntil("h2").andSelf();
        // 添加浮动注释
        let code = currentDoc.find('code');
        code.each(function (index) {
            $(this).parent('pre').append('<a href="javascript:void(0);" class="clone code' + i + index + '">复制</a>');
            let content = $(this).html();

            let clipboard = new ClipboardJS('.code' + i + index, {
                text: function() {
                    return content;
                }
            });

            clipboard.on('success', function(e) {
                alert("复制成功");
            });

            clipboard.on('error', function(e) {
                console.log(e);
            });

            $(this).parent('pre').attr('onmouseover', 'cloneShow(this)');
            $(this).parent('pre').attr('onmouseout', 'cloneHide(this)');

            // 获取所有的字段信息
            let tr = $(this).parent('pre').prevAll("table").first().find('tr:not(:first)');
            fields = new Array();
            tr.each(function () {
                let fieldsKey = $(this).find('td:eq(0)').html();
                fields[fieldsKey] = {'value': $(this).find('td:eq(2)').html(), 'type': $(this).find('td:eq(1)').html()};
            });
            // 获取json进行分析
            codeString = $(this).html();
            let allLineCode = codeString.split('\n');
            key = '';
            lineCode = allLineCode.slice(1, allLineCode.length -1);
            // 搜索对应字段的注释
            lineCode.forEach(function (item, index) {
                // 获取字段
                let string = item.trim();
                let stringPattern = /\"([0-9a-zA-Z\_\-]+)\"/i;
                let field = string.match(stringPattern);
                // 实现注释添加
                if (field) {
                    if (key == '') {
                        if (fields.hasOwnProperty(field[1])) {
                            allLineCode[index+1] += "<span class='type'>&lt;" + fields[field[1]]['type'] + "&gt;</span><span class='comment'>" + fields[field[1]]['value'] + "</span>";
                        }
                    } else {
                        if (fields.hasOwnProperty(key + field[1])) {
                            allLineCode[index+1] += "<span class='type'>&lt;" + fields[key + field[1]]['type'] + "&gt;</span><span class='comment'>" + fields[key + field[1]]['value'] + "</span>";
                        }
                    }
                }
                // 拼接字段全路径
                let leftMiddle = /\[/;
                if (leftMiddle.test(string)) {
                    key += (field ? field[1] : '') + '.*'
                }
                let leftMax = /\{/;
                if (leftMax.test(string)) {
                    key += (field ? field[1] : '') + '.'
                }
                let rightMax = /\}/;
                if (rightMax.test(string)) {
                    key = key.split('.');
                    key = key.slice(0, key.length -2).join('.');
                    key = key ? key + '.' : key;
                }
                let rightMiddle = /\]/;
                if (rightMiddle.test(string)) {
                    key = key.split('.');
                    key = key.slice(0, key.length -2).join('.');
                    key = key ? key + '.' : key;
                }
            });
            // 载入新的代码示例
            $(this).html(allLineCode.join("\n"));
        });
        docs.push(currentDoc);
    }
    // 载入目录
    for (let tag in list) {
        let titleInfo = list[tag];
        let ul = $('.template .summary-tag').clone(true);
        ul.find('a.tag').html(tag);
        let sUl = ul.find('.summary');
        for (let i in titleInfo) {
            let li = sUl.find('.chapter').eq(0).clone(true);
            li.attr('data-index', titleInfo[i]['index']);
            li.find('a.title').html(titleInfo[i]['title']);
            sUl.append(li);
        }
        sUl.find('.chapter').eq(0).remove();
        $('nav').append(ul);
    }
    // 移除多余元素
    $('.preview').remove();
    $('.template').remove();
    // 跟新文档
    update(index, docs);
    // 文档切换
    $('.chapter-title').click(function(event){
        index = parseInt($(this).attr('data-index'));
        update(index, docs);
        console.log(index);
        event.stopPropagation();    //  阻止事件冒泡
    });
    $('.navigation-next').click(function () {
        index = index + 1;
        update(index, docs);
        console.log(index);
    });
    $('.navigation-prev').click(function () {
        index = index - 1;
        update(index, docs);
        console.log(index);
    });

    // 菜单箭头
    $('.summary-tag').click(function () {
        if ($(this).hasClass('icon-arrow-normal')) {
            $(this).removeClass('icon-arrow-normal');
            $(this).addClass('icon-arrow-active');
            $(this).find('.summary-title').stop().animate({height:'toggle'},350);
        } else {
            $(this).removeClass('icon-arrow-active');
            $(this).addClass('icon-arrow-normal');
            $(this).find('.summary-title').stop().animate({height:'toggle'},350);
        }
    });
    $('.chapter-title .title').click(function () {
        $('.chapter-title .title').removeClass('title-active');
        $('.chapter-title .title').addClass('title-normal');
        $(this).removeClass('title-normal');
        $(this).addClass('title-active');
    });
});
// 显示复制按钮
function cloneShow(obj)
{
    $(obj).find('.clone').show();
}
// 隐藏复制按钮
function cloneHide(obj)
{
    $(obj).find('.clone').hide();
}

// 更新文档
function update(index, docs) {
    // 判断索引
    if (index == 0) {
        $('.navigation-prev').hide();
    } else {
        $('.navigation-prev').show();
    }
    if (index == docs.length - 1) {
        $('.navigation-next').hide();
    } else {
        $('.navigation-next').show();
    }
    // 载入文档
    let currentDoc = docs[index];
    $('.markdown-section').html(currentDoc);
    // 滚轮置顶
    $('.book-body').animate({scrollTop: '0px'}, 800);
}
