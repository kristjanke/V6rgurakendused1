window.addEventListener("load", function() {


	var parlid=document.getElementsByClassName('bead');
	var parl;
	var i;

	for (i = 0; i < parlid.length; i++) {
			parl = parlid[i];
			var stiil=window.getComputedStyle(parl);
			var asend=stiil.getPropertyValue('float');
		    // alert(parl.style);
			if (asend == "left") {
			parl.style.cssFloat="left";
			}	 else {
			parl.style.cssFloat="right";
			} 
		}

})