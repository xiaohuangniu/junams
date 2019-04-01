/**
 * 咪咪系统 www.thinkmimi.com
 * ------------------
 */

/*随机数*/
function GetRandomNum(Min,Max) {   
  var Range = Max - Min;   
  var Rand = Math.random();   
  return(Min + Math.round(Rand * Range));   
}   

/*弹窗插件*/
(function($){

	/**
	 * 咪咪系统 - 消息弹窗
	 * @param Data.Content        弹窗内容实体
	 * @param Data.Type           类型
	 * @param Data.Align          对齐方式
	 * @param Data.OutTime        自动关闭时间，(S)秒
	*/
	$.thinkmimi = function (Data) {
    var Key     = 'ID_'+GetRandomNum(1, 5);
    var Id      = 'toast-container';
    var Right   = 'toast-top-right-index';
    var Center  = 'toast-top-center';

		// 设置默认值
		var Data    = arguments[0] ? arguments[0] : '{}';   
		var Content = Data.Content ? Data.Content : '';   
		var Type    = Data.Type    ? Data.Type    : 1;
    var Align   = Data.Align   ? Data.Align   : 'right';
		var OutTime = Data.OutTime ? Data.OutTime : 2000;
    var html    = '';
    var txt     = '';

    // 弹窗样式
    if (Type == 1) {
      txt = '<div id="'+Key+'" class="toast toast-success" style="display:block;opacity:0"><button type="button" class="toast-close-button">×</button><div class="toast-message">'+Content+'</div></div>';
    } else {
      txt = '<div id="'+Key+'" class="toast toast-error" style="display:block;opacity:0"><button type="button" class="toast-close-button">×</button><div class="toast-message">'+Content+'</div></div>';
    }

    // 对齐方式
    if (Align == 'right') {
      var str = $('.'+Right).html();    
      if (typeof(str) !="undefined") {
        $('.'+Right).prepend(txt);
      } else {
        html = '<div id="'+Id+'" class="'+Right+'">'+txt+'</div>';
        $(document.body).append(html);
      }
    } else {
      var str = $('.'+Center).html();    
      if (typeof(str) !="undefined") {
        $('.'+Center).prepend(txt);
      } else {
        html = '<div id="'+Id+'" class="'+Center+'">'+txt+'</div>';
        $(document.body).append(html);
      }
    }

		// 向下滑动渐现
		$("#"+Key).animate({opacity:'1'},700);

    // 开启监听关闭框
		$.MaskClose(Key);
		// 倒计时自动关闭
		window.setTimeout(function(){
      $('#'+Key).animate({opacity:'0'},OutTime);
		}, OutTime);
    window.setTimeout(function(){
      $('#'+Key).remove();
    }, (OutTime*2));
	}; 

  /**
   * 关闭弹窗 
   * @param Key 唯一ID值
  */
  $.MaskClose = function (Key) {
		$('#'+Key+' button').on('click', function(){
			// 倒计时自动关闭
      $('#'+Key).animate({opacity:'0'}, 600);
      window.setTimeout(function(){
        $('#'+Key).remove();
      }, 1000);
		});
	}
	
})(jQuery);