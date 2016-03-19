window.addEventListener("load", function() {
	// alert('Kas töötab?');
	var pildid;
	var galerii;
	galerii=document.getElementById('gallery');
	if (galerii != null ) {
		pildid=galerii.getElementsByTagName('img');
			for (var i=0;i<pildid.length;i++) {
				pildid[i].onclick=function (){
					showDetails(this);
					return false;
				}
			}
		
		}
		
	window.onresize=function() {
	suurpilt=document.getElementById("suurpilt");
	suurus(suurpilt);
	}
	
	var hoidja;
	hoidja=document.getElementById('hoidja');
	function showDetails (el) {
		if (hoidja!=null) {
				suurpilt=document.getElementById("suurpilt");
				suurpilt.src=el.parentNode.href;
				suurpilt.onload=function(){
						suurus(this);
				}
				document.getElementById("inf").innerHTML=el.alt;
				hoidja.style.display="initial";
		}
		
	} 
	
	function hideDetails() {
	document.getElementById('hoidja').style.display="none";
	}
	
	function suurus(el){
	el.removeAttribute("height");
	el.removeAttribute("width");
	if (el.width>window.innerWidth || el.height>window.innerHeight){
		// ainult liiga suure pildi korral
		if (window.innerWidth >= window.innerHeight){
			el.height=window.innerHeight*0.9;
			//console.log('ekraan on lapik')
			// kas element lĆĀ¤heb ikka ĆĀ¼le piiri?
			if (el.width>window.innerWidth){
				el.removeAttribute("height");
				el.width=window.innerWidth*0.9;
			}
		} else {
			el.width=window.innerWidth*0.9;	
			//console.log("ekraan on piklik")
			// kas element lĆĀ¤heb ikka ĆĀ¼le piiri?
			if (el.height>window.innerHeight){
				el.removeAttribute("width");
				el.height=window.innerHeight*0.9;
				}
			}	
		}
	}
	
	
})