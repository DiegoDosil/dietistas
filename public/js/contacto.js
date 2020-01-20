$(document).ready(function()
{
var alturaBocadillo=10;var lateralBocadillo=100;var tempoBocadillo=3000;
if($("#dd_auxsegspopup").attr("class")!=""){tempoBocadillo=1000*(parseInt($("#dd_auxsegspopup").attr("class")));}
//Comprobamos se é un dispositivo móbil
var dd_mobil=false;
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
	{dd_mobil=true;}
if($("#dd_twitter").attr("class")=="true" && dd_mobil){$("#contedor").remove();}
else
{
//Modificamos as marxes:
if($("#dd_mail").attr("class")!="")
	{
	var marxe=parseInt($("#dd_mail").attr("class"));
	$("#contedor").css("bottom", marxe);
	$("#contacto").css("bottom", marxe);
	alturaBocadillo=alturaBocadillo+marxe;
	}
if($("#dd_auxhorizontal").attr("class")!="")
	{
	var horizontal=parseInt($("#dd_auxhorizontal").attr("class"));
	lateralBocadillo=lateralBocadillo+horizontal;
	if($("#contedor").hasClass("dereita"))
		{
		$("#contedor").css("right",horizontal);
		$("#contacto").css("right", horizontal);
		}
	else
		{
		$("#contedor").css("left",horizontal);
		$("#contacto").css("left", horizontal);
		}
	}
if($("#dd_auxbocadillo").attr("class")!="")
	{
	/*if($("#dd_auxcorbocadillo").attr("class")!="")
		{
		var auxcolpopup=$("#dd_auxcorbocadillo").attr("class");
		$("#dd_bocadillo").css("background-color", auxcolpopup);
		if($("#contedor").hasClass("dereita"))
			{
			$('<style>#dd_bocadillo.dereita:after{border-bottom: 20px solid '+auxcolpopup+';}</style>').appendTo('head');
			}
		else
			{
			$('<style>#dd_bocadillo.esquerda:before{border-bottom: 20px solid '+auxcolpopup+';}</style>').appendTo('head');
			}
		}*/
	if($("#contedor").hasClass("dereita")){$("#dd_bocadillo").css("right", lateralBocadillo);}
	else{$("#dd_bocadillo").css("left", lateralBocadillo);}
	$("#dd_bocadillo").css("bottom", alturaBocadillo);
	$("#dd_bocadillo").css("height","auto");
	$("#dd_bocadillo").delay(tempoBocadillo).fadeIn(1000);
	}
//Comprobamos se no BackOffice se desactivou o teléfono e/ou WhatsApp no ordenador
var nonTelefonoOrdenador=false;
var nonWhatsAppOrdenador=false;
if($("#dd_facebook").attr("class")=="nt"){nonTelefonoOrdenador=true;}
if($("#dd_facebook").attr("class")=="nw"){nonWhatsAppOrdenador=true;}
if($("#dd_facebook").attr("class")=="ntw"){nonTelefonoOrdenador=true;nonWhatsAppOrdenador=true;}
//Calculamos o z-index para os enlaces (debería ser o máximo)
var maximoZIndex=calculaZIndex();
var activo=false;var cambio=false;var fondoTransparente=true;
//Asignamos a cor que se recibiu do backoffice
var color=$("#dd_whatsup").attr("class");
if(color==""){color="transparent";}//{color="#FFFFCC";}
//Asignamos o desprazamento inferior que se recibiu do backoffice
/*var marxe=$("#dd_mail").attr("class");
var horizontal=$("#dd_auxhorizontal").attr("class");*/
/*if(marxe!="")
	{
	marxe=parseInt($("#dd_mail").attr("class"));
	$("#contedor").attr("bottom",marxe);
	}*/

//Posicións para as imaxes:
//var posicionsX=["105px","95px","70px","40px","5px"];//20,25,30,35
var posicionsX=["114px","101px","75px","42px","3px"];//20,25,30,35
//var posicionsXCatroElementos=["105px","90px","55px","5px"];//20,25,30,35
var posicionsXCatroElementos=["114px","94px","55px","3px"];//20,25,30,35
//var posicionsY=["5px","40px","70px","95px","110px"];//35,30,25,25
var posicionsY=["3px","44px","78px","102px","114px"];//35,30,25,25
//var posicionsYCatroElementos=["5px","55px","90px","110px"];
var posicionsYCatroElementos=["3px","55px","94px","114px"];
//Cambiamos os valores para o caso de que sexa á dereita:
if($("#contedor").hasClass("dereita"))
	{
	//posicionsX=["10px","30px","50px","80px","115px"];
	posicionsX=["3px","15px","40px","75px","116px"];
	//posicionsXCatroElementos=["10px","30px","65px","115px"];
	posicionsXCatroElementos=["3px","21px","60px","116px"];
	posicionsY=["3px","41px","76px","101px","114px"];
	posicionsYCatroElementos=["3px","53px","93px","114px"];
	}
//Comprobamos que enlaces temos que amosar:
var enlaces=[];
if($("#dd_whatsup").attr('href').length<16 || (!dd_mobil && nonWhatsAppOrdenador)){$("#div1").remove();}
else{enlaces.push($("#dd_whatsup"));}
if($("#dd_facebook").attr('href').length<10){$("#dd_facebook").remove();}
else{enlaces.push($("#dd_facebook"));}
if($("#dd_twitter").attr('href').length<10){$("#dd_twitter").remove();}
else{enlaces.push($("#dd_twitter"));}
if($("#dd_mail").attr('href').length<10){$("#dd_mail").remove();}
else{enlaces.push($("#dd_mail"));}
if($("#dd_telef").attr('href').length<10 || (!dd_mobil && nonTelefonoOrdenador)){$("#dd_telef").remove();}
else{enlaces.push($("#dd_telef"));}
//Cambiamos as posicións das imaxes segundo as que se teñan que amosar
if(enlaces.length==1){posicionsX.splice(0,2);posicionsY.splice(0,2);}
if(enlaces.length==2){posicionsX[0]=posicionsX[1];posicionsX[1]=posicionsX[3];posicionsY[0]=posicionsY[1];posicionsY[1]=posicionsY[3];}
if(enlaces.length==3){posicionsX.splice(1,1);posicionsX.splice(2,1);posicionsY.splice(1,1);posicionsY.splice(2,1);}
if(enlaces.length==4){posicionsX=posicionsXCatroElementos;posicionsY=posicionsYCatroElementos;}
//Asignamos o z-index ós enlaces que se vaian amosar
for(var i=0;i<enlaces.length;i++)
	{
	enlaces[i].attr("z-index",maximoZIndex);
	enlaces[i].children("img").attr("z-index",maximoZIndex);
	}
/*CALCULA O Z-INDEX MAXIMO DO DOCUMENTO
RETURN INT
*/
function calculaZIndex(){
	var max=0;
  	$("body").find(">*").each(function(i, e){
    	var z=Number($(e).css("z-index"));
    	if(z > max) {max=z;}
  	});
  	max++;
  	return max;
}
$("#contacto").click(function(){
	if(dd_mobil)
	{
	$("#dd_bocadillo").stop().fadeOut(400);
	if(activo)
		{
		activo=false;
		for(var i=0;i<enlaces.length;i++)
			{
			if($("#contedor").hasClass("dereita")){enlaces[i].stop().animate({left: 110, bottom: 0}).fadeOut(500);}
			else{enlaces[i].stop().animate({left: 0, bottom: 0}).fadeOut(500);}
			}
		$("#contedor").stop().animate({backgroundColor: "transparent"}, 500 );
		}
	else
		{
		activo=true;
		$("#contedor").stop().animate({backgroundColor: color}, 500 );
		for(var i=0;i<enlaces.length;i++)
			{
			enlaces[i].css("visibility", "visible");
			enlaces[i].stop().animate({left: posicionsX[i], bottom: posicionsY[i]}).fadeIn(500);
			}
		}
	}
	});
//Na versión anterior recollíase a bottom:110
$("#contedor").mouseenter(function(){
	if(!dd_mobil)
	{
	$("#dd_bocadillo").stop().fadeOut(400);
	$("#contedor").stop(true);
	for(var i=0;i<enlaces.length;i++){enlaces[i].stop(true);}
	for(var i=0;i<enlaces.length;i++)
		{
		enlaces[i].css("visibility", "visible");
		enlaces[i].stop().animate({left: posicionsX[i], bottom: posicionsY[i]}).fadeIn(500);
		}
	if(fondoTransparente)
		{
		$("#contedor").stop().animate({backgroundColor: color}, 500 );
		fondoTransparente=false;
		}
	else
		{
		$("#contedor").stop().animate({backgroundColor: "transparent"}, 500 );
		fondoTransparente=true;
		}
	$("#contedor").stop().animate({backgroundColor: color}, 500 );
	fondoTransparente=false;
	}
	});
$("#contedor").mouseleave(function(){
	if(!dd_mobil)
	{
	for(var i=0;i<enlaces.length;i++){enlaces[i].stop(true);}}
	for(var i=0;i<enlaces.length;i++)
		{
		if($("#contedor").hasClass("dereita")){enlaces[i].stop().animate({left: 110, bottom: 0}).fadeOut(500);}
		else{enlaces[i].stop().animate({left: 0, bottom: 0}).fadeOut(500);}
		}
	if(fondoTransparente)
		{
		$("#contedor").stop().animate({backgroundColor: color}, 500 );
		fondoTransparente=false;
		}
	else
		{
		$("#contedor").stop().animate({backgroundColor: "transparent"}, 500 );
		fondoTransparente=true;
		}
	});
}
});