$(document).ready(function () {

    //jquery特效制作复选框全选反选取消(无插件)
    // 全选        
    $(".allselect").click(function () {
        var flag;
        if ($(this).is(":checked")){
            flag=true;
        }else{
            flag=false;
        }
        $(".gwc_tb2 input[type=checkbox]").each(function () {
            $(this).prop("checked", flag);
        });
        GetCount();
    });

    //反选
    $("#invert").click(function () {
        $(".gwc_tb2 input[type=checkbox]").each(function () {
            if ($(this).is(":checked")) {
                $(this).prop("checked", false);
            } else {
                $(this).prop("checked", true);
            } 
        });
        GetCount();
    });

    //取消
    $("#cancel").click(function () {
        $(".gwc_tb2 input[type=checkbox]").each(function () {
            $(this).prop("checked", false);
        });
        GetCount();
    });

    // 所有复选(:checkbox)框点击事件
    $(".gwc_tb2 input[type=checkbox]").click(function () {
          GetCount();
    });

   
});
//******************
function GetCount() {
    var count = 0;
    var total = 0;
    var price,num;
    

    $(".gwc_tb2 input[type=checkbox]").each(function () {
        
        if ($(this).is(":checked")) {
                price=parseInt($(this).parent().parent().find("[type=hidden]").val());
                num=parseInt($(this).parent().parent().find("input[type=text]").val());
                count += num;
                total += price*num;
                console.log(price);
            }
        });
        $("#shuliang").text(count);
        $("#zong1").html((total).toFixed(2));
        $("#jz1").css("display", "none");
        $("#jz2").css("display", "block");
    }



// 商品加减算总数
  $(function () {
          $(".shop table input[value=-]").click(function () {      
                var countE=$(this).siblings("[type=text]");
                var labelE=$(this).parent().parent().find("label");
                var count=parseInt(countE.val());

                 if(count<1){
                    countE.val(0);
                    labelE.html(0);
                }else{
                    countE.val(count-1) ;
                    var value=$(this).siblings("[type=hidden]").val()*(count-1);        
                    labelE.html(value);
                }
                
           GetCount();
        });

        $(".shop table input[value='+']").click(function () {
             
             var countE=$(this).siblings("[type=text]");
             var count=parseInt(countE.val())+1;
                 countE.val(count);
                 value=$(this).siblings("[type=hidden]").val()*count;
                $(this).parent().parent().find("label").html(value);
           
           GetCount();
        });


      
        function setTotal(obj) {
            if (!obj){
                $(".shop l").html((parseInt(t.val()) * 59).toFixed(2));
                $("#newslist-1").val(parseInt(t.val()) * 59);
            }
        }
        
    })

// table
 $(function(){
             $(".table div").hide();
            $(".table div").first().show();
            $(".table>ul>li").eq(0).addClass("active")
            $(".table>ul>li").hover(function(){
                $(this).addClass("active").siblings().removeClass("active");
                var i=$(this).index();
                $(".table div").eq(i).show().siblings("div").hide();
            })
        })
