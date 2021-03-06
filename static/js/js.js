
function show_search_list(search_value) {
    var list = [
        {"name":"京东","url":"https://search.jd.com/Search?keyword=","image":""},
        {"name":"淘宝","url":"https://s.taobao.com/search?q=","image":""},
        {"name":"百度","url":"https://www.baidu.com/s?tn=baidu&wd=","image":""}
    ];

    var html = '';
    for (var i=0; i<list.length; i++) {
        var data_tag = '';
        if (i === (list.length-1)) {
            data_tag = 'end';
        }
        html += '<a class="searcher" tabindex="'+(i+2)+'" data-tag="'+data_tag+'" href="'+list[i].url+search_value+'" target="_blank">';
        html += '<span>'+search_value + '</span><span>'+ list[i].name + '</span></a>';
    }
    html += '<a href="javascript:hidden_search_list()"><span></span><span>关闭</span></a>';

    document.getElementById('search_list').innerHTML = html;
    document.getElementById('search_list').className='show';
    //document.getElementById('searcher0').focus();
}

function hidden_search_list(){
    document.getElementById('search_list').className='hidden';
}
document.onkeydown=function(){
    if(window.event.keyCode == 9){ 

        //var focusTag = document.activeElement.tagName;
        var data_tag = document.activeElement.getAttribute('data-tag');

        if (data_tag === 'end') {
            document.getElementById('search_bar').focus();
            return false;
        }

    }
} 