function ocultar(){
	var l=document.getElementById("log");
	var nodoocultar=document.getElementsByClassName("ocultar");
	/*alert(nodoocultar);*/
	//alert(nodoocultar[0]+"\n"+nodoocultar.length);
	for(var i=0;i<nodoocultar.length;i++){
		//alert("hola");
		nodoocultar[i].style.display="none";
		//console.log("hola");
		if(i===nodoocultar.length-1){
			//console.log("hola");
			l.style.display="block";
		}
	}
}
	