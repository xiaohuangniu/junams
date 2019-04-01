
/*! juncmd.js | (c) 20017 小黄牛 - 1731223728@qq.com | 转载请著名原创作者 */
// 设置CMD界面全屏
$('.cmd').css('height', ($(window).height()-20)+'px');
$('.cmd').css('width' , ($(window).width()-20)+'px');
// 代码编辑界面全屏
$('.code-upd').css('height', $(window).height()+'px');
$('.code-upd').css('width' , $(window).width()+'px');

var cursor_status = 1; 
var cursor_model  = false; 

// 开机显示打字机
(function(a) {
      a.fn.typewriter = function(speed) {
          this.each(function() {
             var d = a(this),
              c = d.html(),
              b = 0;
              d.html("");
             var e = setInterval(function() {
                  var f = c.substr(b, 1);
                 if (f == "<") {
                     b = c.indexOf(">", b) + 1
                 } else {
                     b++
                 }
                 d.html(c.substring(0, b) );
                 if (b >= c.length) {
                     clearInterval(e)
                 }
             },
             speed)
         });
         cursor_model = true;
         return this;
     }
 })(jQuery);
$(".cmd").typewriter(0);

// 打字机显示完自动获取光标
setTimeout(function(){
    var html = $('.cmd').html();
    $('.cmd').html('');
    $('.cmd').focus(); 
    Focus(html);  
}, 700);


// 快捷键
$(document).keyup(function(event){
    var code = event.keyCode;
    switch(code) { 
    // ESC键 - 清空当前屏幕
    case 27:
    case 96:
        var code_class = $(".code-upd").css('display'); 
        if(code_class == 'block'){
            code_out();
            break;
        }
        var html = $('.cmd').html();
        html = html.substring(0, html.length-6);
        setCookie('esc_key', html);
        $('.cmd').html('');
        $('.cmd').focus(); 
        Focus('<div><span class="command-line" contenteditable="false">command line：></span>&nbsp;');
        $('.cmd').append('</div>');
    break;
    // F1 恢复清屏
    case 112:
        $('.cmd').html('');
        html = getCookie('esc_key');
        Focus(html);
        $('.cmd').append('</div>');
    break;
    }
});

// 设置cookies
function setCookie(name,value) { 
    var Days = 1; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 

// 读取cookies 
function getCookie(name) { 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 


// 设置光标位置一直在末尾
function Focus(html) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            // Range.createContextualFragment() would be useful here but is
            // non-standard and not supported in all browsers (IE9, for one)
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);
            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(html);
    }
 }

 
$(".code-out").click(function(){
    code_out();
});
function code_out(){
    $(".code-upd").fadeOut(1000); 
    // 清除编辑器
    $('.CodeMirror').slideUp(1100, function(){ $(this).remove() });
}

function prompt(Data) {  
		// 设置默认值
		var Data       = arguments[0]    ? arguments[0]    : '{}';   
		var Id         = Data.Id         ? Data.Id         : '';  
		var Content    = Data.Content    ? Data.Content    : ''; 
		var Color      = Data.Color      ? Data.Color      : 'red'; 
		var OutState   = Data.OutState   ? Data.OutState   : true; 
		var OutTime    = Data.OutTime    ? Data.OutTime    : 2500;
		$('#'+Id).html(Content);

		// 修改初始化样式
		$('#'+Id).css('position','absolute');
		$('#'+Id).css('opacity','-10');
		$('#'+Id).css('left','0px');
		$('#'+Id).css('z-index','99999999999999999999');
		$('#'+Id).css('color',Color);
        
		// 向左滑渐现
		$("#"+Id).animate({left:'0px',opacity:'1'},700);

		// 开启自动关闭功能
		if(OutState == true){
			window.setTimeout(function(){
				// 向右滑渐隐
				$("#"+Id).animate({left:'0px',opacity:'0'},700);
			},OutTime);
		}

        $('#'+Id).click(function(){
			// 向右滑渐隐
			$("#"+Id).animate({left:'0px',opacity:'0'},700);
        });
}; 
