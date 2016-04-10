document.querySelector("#kuva-lisa-vorm").addEventListener(
	"click",
	function(event){
		document.querySelector("#lisa-vorm-vaade").style.display='block';
		
	}
);
document.querySelector("#peida-lisa-vorm").addEventListener(
	"click",
	function(event){
		document.querySelector("#lisa-vorm-vaade").style.display='none';
		
	}
);
document.querySelector("#lisa-vorm").addEventListener(
	"submit",
	function(event) {
		event.preventDefault();
		var nimetus=document.querySelector("#nimetus").value;
		var kogus=Number(document.querySelector("#kogus").value);
		if (!nimetus || !kogus) {
			alert ("Sisesta kõik andmed!");
			return;
			
		}
		lisaKirje(nimetus,kogus);
		
		document.querySelector("#nimetus").value= " ";
		document.querySelector("#kogus").value=" ";
	}
);
function lisaKirje(nimetus,kogus) {
	var rida = document.createElement('tr');
	var nimetusRuut = document.createElement('td');
	var kogusRuut = document.createElement('td');
	var tegevusRuut=document.createElement('td');
	
	var kustutaNupp=document.createElement('input');
	kustutaNupp.setAttribute('type','button');
	kustutaNupp.value="Kustuta rida";
	
	nimetusRuut.textContent=nimetus;
	kogusRuut.textContent=kogus;
	tegevusRuut.appendChild(kustutaNupp);
	
	rida.appendChild(nimetusRuut);
	rida.appendChild(kogusRuut);
	rida.appendChild(tegevusRuut);
	
	document.querySelector('#kirjed tbody').appendChild(rida);
	
	kustutaNupp.addEventListener('click',function(event) {
		if (confirm("Kas oled kindel")) {
			rida.parentNode.removeChild(rida);
		}
		
	});
	
	
}