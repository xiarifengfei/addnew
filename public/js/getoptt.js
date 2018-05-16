	function getoptt(lv,ap,pd){
		var selectObj=document.getElementById("stime");
		//alert(selectObj.options[0].value);
		var laObj=document.uid;  
		var date =new Date().getTime();
		var addb=1;
		var count=1;
		var dd=0;
		for(var i=0;i<10;i++){  
			var temptime=Math.ceil(date/(1000*30*60)) *30*60*1000+ (i+1)*30*60*1000;
			var apl=ap.length;
			while (apl--){
				//alert(Date.parse(ap[j].stime));
				var apone=ap[apl];
				if (apone.uid==lv&& Date.parse(apone.stime)==(temptime)){
					addb=0;
					var prid=Number(apone.pid)-1;
					dd=Math.ceil(Number(pd[prid].duration) /30);
					break;
				}
			}			
			if (addb==1&&dd<=0){
				var td=new Date(temptime-14400000).toISOString().slice(0, 19).replace('T', ' ');
				selectObj[count]=new Option(td,td);
				count+=1;
			}
			addb=1;
			dd--;
			

       		  
     	} 
	}

  
