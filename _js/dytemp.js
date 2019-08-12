// FUNÇÕES NORMAIS
var interval, control=0;

function carregarCab(){
	$("#cab-txt").val($("#arq-proj header h1").html());

	$("#cor-header").colorPick({
		'initialColor' : $("#arq-proj header").css("color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj header").css('color',this.color);
		}
	});

	$("#bg-header").colorPick({
		'initialColor' : $("#arq-proj header").css("background-color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj header").css('background-color',this.color);
		}
	});

	if($("#arq-proj header h1").css("font-weight") == '700'){
		$("#bolder-cab-bt").toggleClass('bt-txt');
		$("#bolder-cab-bt").toggleClass('active-bt-txt');
	}

	if($("#arq-proj header h1").css("text-decoration") == ("underline solid " + $("#arq-proj header").css("color"))){
		$("#underline-cab-bt").toggleClass('bt-txt');
		$("#underline-cab-bt").toggleClass('active-bt-txt');
	}

	if($("#arq-proj header h1").css("font-style") == 'italic'){
		$("#italic-cab-bt").toggleClass('bt-txt');
		$("#italic-cab-bt").toggleClass('active-bt-txt');
	}

	$("#pos-cab-txt").val($("#arq-proj header").css("text-align"));
	$("#tam-cab-txt").val($("#arq-proj header h1").css("font-size"));
	$("#pd-cab-txt").val($("#arq-proj header").css("padding"));
}

function carregarTxt(bloco){
	$("#edited-block").val(bloco);

	$("#cor-div-h1").colorPick({
		'initialColor' : $("#arq-proj #" + bloco + " h1").css("color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj #" + bloco + " h1").css('color',this.color);
		}
	});

	$("#cor-div-txt").colorPick({
		'initialColor' : $("#arq-proj #" + bloco + " .text").css("color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj #" + bloco + " .text").css('color',this.color);
		}
	});

	$("#bg-div").colorPick({
		'initialColor' : $("#arq-proj #" + bloco).css("background-color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj #" + bloco).css('background-color',this.color);
		}
	});

	$("#pos-div-txt").val($("#arq-proj #" + bloco + " .text").css("text-align"));
	$("#pd-div-txt").val($("#arq-proj #" + bloco).css("padding"));
	$("#pd-div-txt").attr("onchange","paddingSet($(this).val(),'#"+ bloco +"')");
	$("#div-txt-h1").val($("#arq-proj #" + bloco + " h1").html());
	$("#div-txt").val($("#arq-proj #" + bloco + " .text").html());
}

function carregarRdp(){

	$("#rdp-autor-txt").val($("#arq-proj footer #nomeAutor").html());
	$("#rdp-ano-txt").val($("#arq-proj footer #ano").html());

	$("#cor-footer").colorPick({
		'initialColor' : $("#arq-proj footer").css("color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj footer").css('color',this.color);
		}
	});

	$("#bg-footer").colorPick({
		'initialColor' : $("#arq-proj footer").css("background-color"),
		'onColorSelected': function() {
			this.element.css({'backgroundColor': this.color});
			$("#arq-proj footer").css('background-color',this.color);
		}
	});

	if($("#arq-proj footer span").css("font-weight") == '700'){
		$("#bolder-rdp-bt").toggleClass('bt-txt');
		$("#bolder-rdp-bt").toggleClass('active-bt-txt');
	}

	if($("#arq-proj footer span").css("text-decoration") == "underline solid " + $("#arq-proj footer span").css("color")){
		$("#underline-rdp-bt").toggleClass('bt-txt');
		$("#underline-rdp-bt").toggleClass('active-bt-txt');
	}

	if($("#arq-proj footer span").css("font-style") == 'italic'){
		$("#italic-rdp-bt").toggleClass('bt-txt');
		$("#italic-rdp-bt").toggleClass('active-bt-txt');
	}

	$("#pos-rdp-txt").val($("#arq-proj footer").css("text-align"));
	$("#tam-rdp-txt").val($("#arq-proj footer span").css("font-size"));
	$("#pd-rdp-txt").val($("#arq-proj footer").css("padding"));
}

function hexToRGB(hex) {
    var bigint = parseInt(hex, 16);
    var r = (bigint >> 16) & 255;
    var g = (bigint >> 8) & 255;
    var b = bigint & 255;
    return r + "," + g + "," + b;
}

function ativarAutoSave(){
	control = 1;
	interval = setInterval(function(){
		$.ajax({
			url : "_proj/salvar-projeto.php",
			type : 'post',
			data : {
				html : $("#arq-proj").html()
			}
		}).done(function(msg){
			// alert(msg);
		});
	},2000);
}

function desativarAutoSave(){
	if(control!= 0){
		clearInterval(interval);
		control = 0;
	}
	$.ajax({
		url: 'unset-session.php',
		type :'get'
	}).done(function(msg){
		// alert(msg);
	});
}

function txtPos(alg,bloco){
	$("#arq-proj " + bloco).css("text-align",alg);
}

function fontSize(alg,bloco){
	$("#arq-proj " + bloco).css("font-size",alg);
}

function paddingSet(alg,bloco){
	$("#arq-proj " + bloco).css("padding",alg);
}

function confAtributos(bloco){
	$("#bloco-itens").css("width","0");
	$("#arq-proj").css("width","60%");
	$("#bloco-atr").css("width","40%");
	$("#bloco-atr").css("display","block");
	$("#atr-list").css("width","95%");
	$("#atr-list").css("height","95%");

	$(".dy-block").css("display","none");

	if(bloco == 'header'){
		$("#atr-header").css("display","block");
	}else if(bloco == 'footer'){
		$("#atr-footer").css("display","block");
	}else if(bloco == 'nav'){
		$("#atr-nav").css("display","block");
	}else{
		$("#atr-txt").css("display","block");
	}
}



