/**
 * 咪咪系统 www.thinkmimi.com
 * ------------------
 */
$('.divTab').css('height', ($(window).height()-51)+'px');
/*点击缩放，框架内容自适应宽度*/
$('.sidebar-toggle').click(function(){
  var right = $('.content-wrapper').css('padding-right');
  var width = $(document).width();
  if (width <= 750) return true;
  if (right == '1px') {
    $('.content-wrapper').css('width', (width-230)+'px');
    $('.content-wrapper').css('padding-right', '0px');
  } else {
    $('.content-wrapper').css('width', (width-50)+'px');
    $('.content-wrapper').css('padding-right', '1px');
  }
})

/*主动生成菜单*/
function add_menu(_this){
  var file  = $(_this).attr('data-url');
  var html = $(_this).text();//prop("outerHTML");
      html = '<li class="active"><a data-url="'+file+'"><i class="fa fa-hand-pointer-o"></i><span>'+html+'</span></a><i class="close-tab fa fa-remove"></i></li>';
  var no    = $('.content-wrapper').attr('src');

  // 先清除所有样式
  $('.sidebar-menu li').removeClass('active');
  $('.sidebar-menu li').removeClass('menu-open');
  $('.sidebar-menu li ul').css('display', 'none');

  if (file == no) return false;

  if (typeof(file) !="undefined" && file != '' && file != null){
      var status = true;
      // 遍历所有标签，查看该菜单是否已被打开过
      $('.nav-addtabs a').each(function(){
        if ($(this).attr('data-url') == file) {
          // 先清除所有高亮样式
          $('.nav-addtabs').children('li').removeClass('active');
          $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');
          // 当前标签打开并高亮显示
          $(this).parent().addClass('active');
          $('.content-wrapper').attr('src', file);
          status = false;
          return true;
        }
      });

    if (status == false) return false;

    // 先清除所有高亮样式
    $('.nav-addtabs').children('li').removeClass('active');
    $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');

    // 获取已打开的菜单数量
    var num = $('.nav-addtabs').children('li').length;

    if (num <= 12) {
      // 复制菜单到标签栏
      $('.nav-addtabs').append(html);
      $('.tabdrop').css('display', 'none');
    } else {
      // 复制菜单到下拉框
      $('.nav-addtabs .dropdown-menu').append(html);
      $('.tabdrop').css('display', 'block');
      $('.tabdrop').addClass('active');
    }
    
    // 打开页面
    $('.content-wrapper').attr('src', file);
  }
}

/*点击菜单*/
$('.sidebar-menu li a').click(function(){
  var html = $(this).parent().html();//prop("outerHTML");
      html = '<li class="active">'+html+'<i class="close-tab fa fa-remove"></i></li>';
  var file  = $(this).attr('data-url');
  var no    = $('.content-wrapper').attr('src');

  var display = $(this).parent().hasClass('menu-open');

  if (display == false) {
    // 先清除所有样式
    $('.sidebar-menu li').removeClass('active');
    $('.sidebar-menu li').removeClass('menu-open');
    $('.sidebar-menu li ul').css('display', 'none');
    
    // 当前标签先高亮显示
    $(this).parent().addClass('active');
    $(this).parent().parent().parent().addClass('active');
    $(this).parent().parent().parent().addClass('menu-open');
    $(this).parent().parent().css('display', 'block');
  }

  if (file == no) return false;

  if (typeof(file) !="undefined" && file != '' && file != null){
      var status = true;
      // 遍历所有标签，查看该菜单是否已被打开过
      $('.nav-addtabs a').each(function(){
        if ($(this).attr('data-url') == file) {
          // 先清除所有高亮样式
          $('.nav-addtabs').children('li').removeClass('active');
          $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');
          // 当前标签打开并高亮显示
          $(this).parent().addClass('active');
          // $('.content-wrapper').attr('src', file);
          $(".content-wrapper").each(function(ii,vv){
            $(this).css('display','none');

            if ($(this).attr('src') === file){
              $(this).css('display', 'block');
            }
          });
          status = false;
          return true;
        }
      });

    if (status == false) return false;

    // 先清除所有高亮样式
    $('.nav-addtabs').children('li').removeClass('active');
    $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');

    // 获取已打开的菜单数量
    var num = $('.nav-addtabs').children('li').length;

    if (num <= 7) {
      // 复制菜单到标签栏
      $('.nav-addtabs').append(html);
      $('.tabdrop').css('display', 'none');
    } else {
      // 复制菜单到下拉框
      $('.nav-addtabs .dropdown-menu').append(html);
      $('.tabdrop').css('display', 'block');
      $('.tabdrop').addClass('active');
    }
    
    // 打开页面
    // $('.content-wrapper').attr('src', file);


    // 其他iframe隐藏
    // 存在则显示 不存在则新建
    $(".content-wrapper").each(function(ii,vv){
      $(this).css('display','none');

      if ($(this).attr('src') == file){
        $(this).css('display', 'block');
      }
    });

    let temHtml = '<iframe class="content-wrapper" src="' + file + '" width="100%" height="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling-x="no" scrolling-y="auto" allowtransparency="yes" style="min-height: ' +  ($(window).height()-51) + 'px"></iframe>';
    $("#ifram-box").append(temHtml);
  }
})

/*点击标签打开页面*/
$(document).on('click','.nav-addtabs a', function(){
  var file = $(this).attr('data-url');
  var no    = $('.content-wrapper').attr('src');
  if (file == no) return false;
  
  // 先清除所有高亮样式
  $('.nav-addtabs').children('li').removeClass('active');
  $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');
  // 当前标签打开并高亮显示
  $(this).parent().addClass('active');
  // $('.content-wrapper').attr('src', file);

  $(".content-wrapper").each(function(ii,vv){
    $(this).css('display','none');

    if ($(this).attr('src') === file){
      $(this).css('display', 'block');
    }
  });

  return false;
});

/*点击关闭标签页面*/
$(document).on('click','.nav-addtabs .close-tab', function(){
  // 获取已打开的菜单数量
  var num = $('.nav-addtabs').children('li').length;
  if (num <= 2) return false;

  // 直接从下拉框里取出一个标签
  if (num >= 8) {
    var _this = $('.nav-addtabs .dropdown-menu li:first');
    var file  = $(_this).children('a').attr('data-url');
    // 当前标签先高亮显示
    $(_this).addClass('active');
    // 再copy自身标签
    var html = $(_this).prop("outerHTML");
    // 删除自身
    $(_this).remove();
    // 删除当前的标签
    $(this).parent().remove();
    // 删除iframe
    $(".content-wrapper").each(function(ii,vv){
      if ($(this).attr('src') === $(this).parent().find('a').attr('data-url')){
        $(this).remove();
      }
    });
    // 再清除所有高亮样式
    $('.nav-addtabs').children('li').removeClass('active');
    $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');
    // 再加入标签栏
    $('.nav-addtabs').append(html);
    // 获得下拉框里的标签数
    var length = $('.nav-addtabs .dropdown-menu li').length;
    if (length == 0) {
      $('.tabdrop').css('display', 'none');
    }
  } else {
    // 获得下一个兄弟元素的路径
    var _this = $(this).parent().next();
    var file  = $(_this).children('a').attr('data-url');
    // 如果没有下级路径，就尝试获取上级路径
    if (typeof(file) =="undefined" || file == '' || file == null){
      var _this = $(this).parent().prev();
      var file  = $(_this).children('a').attr('data-url');
    }
    // 删除当前的标签
    $(this).parent().remove();
    // 删除iframe
    let dataurl = $(this).parent().find('a').attr('data-url');

    $(".content-wrapper").each(function(ii,vv){
      if ($(this).attr('src') === dataurl ){
        $(this).remove();
      }
    });
    // 先清除所有高亮样式
    $('.nav-addtabs').children('li').removeClass('active');
    $('.nav-addtabs .dropdown-menu').children('li').removeClass('active');
    // 当前标签高亮显示
    $(_this).addClass('active');
  }

  // 如果链接与当前链接不一样，则重新打开
  // if ($('.content-wrapper').attr('src') == file) return false;
  // $('.content-wrapper').attr('src', file);

  $(".content-wrapper").each(function(ii,vv){
    if ($(this).attr('src') === file){
      $(this).css('display', 'block');
    }
  });
  return false;
});

/*点击页面全屏打开*/
function Fkey(){ 
  var el = document.documentElement,
        rfs = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullScreen,
        wscript;
 
    if(typeof rfs != "undefined" && rfs) {
        rfs.call(el);
        return;
    }
 
    if(typeof window.ActiveXObject != "undefined") {
        wscript = new ActiveXObject("WScript.Shell");
        if(wscript) {
            wscript.SendKeys("{F11}");
        }
    }
} 

// 点击打开功能面板
$('.clickTab').on('click',function(){
    $("#divTab").animate({right:"0px"});
});
// 关闭功能面板函数
function onTab(){
    $("#divTab").animate({right:"-30%"});
}
// 点击关闭功能面板
$('#onTab').on('click',function(){
    onTab();
});


// 菜单列表前缀生成
function menu_run(type) {
  type = type ?  type : false;
  var id_num = -1;
  $('#table thead th').each(function(){
    id_num++;
    var status = $(this).attr('data-status');
    var title  = $(this).children('div').html();
    var checked= '';
    if (title.indexOf('input') == -1 && title.indexOf('checkbox') == -1) {
      if (status == 1) {
        checked = 'checked';
      } else {
        $("#table tr").each(function(){
          $(this).find('td:eq('+id_num+')').hide();
        });
        $('#table').find('th:eq('+id_num+')').hide();
      }
      if (type === true) {
        var html = '<li role="menuitem"><label><input type="checkbox" data-field="'+title+'" value="1" '+checked+'>'+title+'</label></li>';
        $('#table_menu').append(html);
      }
    }
  });
}
menu_run(true);
// 点击菜单列表显示隐藏对应th列
$(document).on('click','#table_menu input', function(){
  var title  = $(this).attr('data-field');
  var id_num = 0;
  $('#table thead th').each(function(){
    if ($(this).children('div').html() == title) {
      return false;
    }
    id_num++;
  });
  if ($(this).prop("checked") == true) {
    $('#table tr').each(function(){
      $(this).find('th:eq('+id_num+')').show();
      $(this).find('td:eq('+id_num+')').show();
    });
  } else {
    $('#table tr').each(function(){
      $(this).find('th:eq('+id_num+')').hide();
      $(this).find('td:eq('+id_num+')').hide();
    });
  }
});
// 左侧菜单搜索
$(".sidebar-form .input-group .form-control").bind("input propertychange",function(event){
  var val = $(this).val();
  if (val == '') {
      $('.sidebar-menu li').show();
      return false;
  }
  // 先遍历1级分类
  $(".sidebar-menu>li>a>.menu-text").each(function(){
      var txt = $(this).html();
      if (txt.indexOf(val) >= 0) {
          $(this).parent().parent().show();
      } else {
          $(this).parent().parent().hide();
      }
  });
  // 再遍历2级分类
  $(".sidebar-menu>li>ul>li>a>.menu-text").each(function(){
      var txt = $(this).html();
      if (txt.indexOf(val) >= 0) {
          $(this).parent().parent().show();
          $(this).parent().parent().parent().parent().show();
      } else {
          $(this).parent().parent().hide();
      }
  });
});