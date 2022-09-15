// JavaScript Document
$(function(){
	$(".product_img .smallimg li").click(function(){
		$(".product_img .bigimg li").eq($(".product_img .smallimg li").index(this)).addClass("qianzhi").siblings("li").removeClass("qianzhi");
	});
	$(".right .tit .left span").click(function(){
		$(".right .tit .left span").eq($(".right .tit .left span").index(this)).addClass("dq").siblings("span").removeClass("dq");
		$(".right .right_c").eq($(".right .tit .left span").index(this)).addClass("dq").siblings("div").removeClass("dq");
	});
});
	//秒杀倒计时
	function daojishi(starttime,endtime,box){
		if(!box){
			box = "timer"
		}
		//1、获取到期时间
		var starttime = starttime;
		var endtime = endtime;
		showtime();
		var timer = setInterval(showtime,1000);
		
		function showtime(){
			//当前时间
			var str='';
			var nowtime = new Date;
			nowtime = nowtime.getTime();
			
			var djstime = starttime-Math.floor(nowtime/1000);
			var dqsj = endtime-Math.floor(nowtime/1000);
			if(djstime>0){
				var day = Math.floor(djstime/86400);
				djstime-=day*86400;
				var hour = Math.floor(djstime/3600);
				djstime-=hour*3600;
				var minute = Math.floor(djstime/60);
				djstime-=minute*60;
				var second = djstime;
				
				str+="还剩<span>"+day+"</span>天<span>"+hour+"</span>小时<span>"+minute+"</span>分钟<span>"+second+"</span>秒";
				//starttime-=1000;
			}else if(djstime<=0&&dqsj>0){
				str="秒杀活动正在进行中！";
			}else{
				str="秒杀活动已结束！";
			}
			$("."+box).html(str);
			
		}
	}
	function closebox(){
		$("#hongbaolq").css({"display":"none"});
		$("#hongbaolq").siblings("div").css({"opacity":"1"});
	}
	
	function qianghongbao(hongbao_id){
		$("#hongbaolq").css({"display":"block"});
		$("#hongbaolq").siblings("div").css({"opacity":"0.5"});
		$("#hongbao_id").val(hongbao_id);
	}