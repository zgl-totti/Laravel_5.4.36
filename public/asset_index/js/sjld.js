	var ps=["北京市","天津市","上海市","重庆市","河北省"];
	var cs=[
		["北京市"],
		["天津市"],
		["上海市"],
		["重庆市"],
		["石家庄市","张家口市","承德市","秦皇岛市"]
	]
	var qs=[
		[["东城区","西城区","崇文区","宣武区","朝阳区","丰台区"]],
		[["和平区","河东区","河西区","南开区","河北区","红桥区"]],
		[["黄浦区","卢湾区","徐汇区","长宁区","静安区","普陀区"]],
		[["渝中区","大渡口区","江北区","沙坪坝区","九龙坡区"]],
		[["长安区","桥东区","桥西区","新华区","裕华区"],
		["桥西区","桥东区","宣化区","下花园区","宣化县"],
		["双桥区","双滦区","鹰手营子矿区","承德县","下板城镇"],
		["海港区","山海关区","北戴河区","昌黎县","昌黎镇","抚宁县"]
		]
	]

function xzdz(p,c,q) {
	document.write('<select id="psx" onchange="show1(this)" value"'+p+'" name="ps">');
	document.write('<option value="">--请选择省市--</option>');
	for (x in ps) {
		document.write('<option value="'+ps[x]+'">'+ps[x]+'</option>');
	}
	document.write('</select>');

	document.write('<select id="csx" onchange="show2(this)"  value"'+c+'" name="qs">');
	document.write('<option value="">--请选择城市--</option>');
	document.write('</select>');

	document.write('<select id="qsx"  value"'+q+'" name="ws">');
	document.write('<option value="">--请选择区县--</option>');
	document.write('</select>');

}


//var	qg=document.getElementById('qsx');


function show1(obj){
		pg=document.getElementById('psx');
		cg=document.getElementById('csx');
		qg=document.getElementById('qsx');
		a=pg.selectedIndex-1; //alert(pg.selectedIndex);
		cg.innerHTML="";
	
	if(a>=0){
		for (var h=0;h<cs[a].length;h++){
				//alert(cs[a][h]);
			var opt=document.createElement("option");
				txt=cs[a][h];
				opt.value=txt;
				opt.innerHTML=txt;
				cg.appendChild(opt);

			b=cg.selectedIndex;
			qg.innerHTML="";
		
			if(b>=0){
				for (var i=0;i<qs[a][b].length;i++){
					var opt1=document.createElement("option");
						txte=qs[a][b][i];
						opt1.value=txte;
						opt1.innerHTML=txte;
						qg.appendChild(opt1);

				}
			}

		}
	}else{
		var opt=document.createElement("option");
				opt.value="";
				opt.innerHTML="--请选择城市--";
				cg.appendChild(opt);

				qg.innerHTML="";
		var opt2=document.createElement("option");
						opt2.value="";
						opt2.innerHTML="--请选择区县--";
						qg.appendChild(opt2);		
	}

}
		function show2(obj){
			
			b=cg.selectedIndex;
			qg.innerHTML="";
		
			if(b>=0){
				for (var i=0;i<qs[a][b].length;i++){
					var opt1=document.createElement("option");
						txte=qs[a][b][i];
						opt1.value=txte;
						opt1.innerHTML=txte;
						qg.appendChild(opt1);

				}
			}
		}