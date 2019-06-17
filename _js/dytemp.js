// FUNÇÕES DA PALETA DE CORES


(function($){$.fn.colorPick=function(config){return this.each(function(){new $.colorPick(this,config||{})})};$.colorPick=function(element,options){options=options||{};this.options=$.extend({},$.fn.colorPick.defaults,options);if(options.str){this.options.str=$.extend({},$.fn.colorpickr.defaults.str,options.str)}
$.fn.colorPick.defaults=this.options;this.color=this.options.initialColor.toUpperCase();this.element=$(element);var dataInitialColor=this.element.data('initialcolor');if(dataInitialColor){this.color=dataInitialColor;this.appendToStorage(this.color)}
var uniquePalette=[];$.each($.fn.colorPick.defaults.palette.map(function(x){return x.toUpperCase()}),function(i,el){if($.inArray(el,uniquePalette)===-1)uniquePalette.push(el)});this.palette=uniquePalette;return this.element.hasClass(this.options.pickrclass)?this:this.init()};$.fn.colorPick.defaults={'initialColor':'#3498db','paletteLabel':'Default palette:','allowRecent':!0,'recentMax':5,'allowCustomColor':!1,'palette':["#1abc9c","#16a085","#2ecc71","#27ae60","#3498db","#2980b9","#9b59b6","#8e44ad","#34495e","#2c3e50","#f1c40f","#f39c12","#e67e22","#d35400","#e74c3c","#c0392b","#ecf0f1","#bdc3c7","#95a5a6","#7f8c8d"],'onColorSelected':function(){this.element.css({'backgroundColor':this.color,'color':this.color})}};$.colorPick.prototype={init:function(){var self=this;var o=this.options;$.proxy($.fn.colorPick.defaults.onColorSelected,this)();this.element.click(function(event){event.preventDefault();self.show(event.pageX,event.pageY);$('.customColorHash').val(self.color);$('.colorPickButton').click(function(event){self.color=$(event.target).attr('hexValue');self.appendToStorage($(event.target).attr('hexValue'));self.hide();$.proxy(self.options.onColorSelected,self)();return!1});$('.customColorHash').click(function(event){return!1}).keyup(function(event){var hash=$(this).val();if(hash.indexOf('#')!==0){hash="#"+hash}
if(/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(hash)){self.color=hash;self.appendToStorage(hash);$.proxy(self.options.onColorSelected,self)();$(this).removeClass('error')}else{$(this).addClass('error')}});return!1}).blur(function(){self.element.val(self.color);$.proxy(self.options.onColorSelected,self)();self.hide();return!1});$(document).on('click',function(event){self.hide();return!0});return this},appendToStorage:function(color){if($.fn.colorPick.defaults.allowRecent===!0){var storedColors=JSON.parse(localStorage.getItem("colorPickRecentItems"));if(storedColors==null){storedColors=[]}
if($.inArray(color,storedColors)==-1){storedColors.unshift(color);storedColors=storedColors.slice(0,$.fn.colorPick.defaults.recentMax)
localStorage.setItem("colorPickRecentItems",JSON.stringify(storedColors))}}},show:function(left,top){$("#colorPick").remove();$("body").append('<div id="colorPick" style="display:none;top:'+top+'px;left:'+left+'px"><span>'+$.fn.colorPick.defaults.paletteLabel+'</span></div>');jQuery.each(this.palette,function(index,item){$("#colorPick").append('<div class="colorPickButton" hexValue="'+item+'" style="background:'+item+'"></div>')});if($.fn.colorPick.defaults.allowCustomColor===!0){$("#colorPick").append('<input type="text" style="margin-top:5px" class="customColorHash" />')}
if($.fn.colorPick.defaults.allowRecent===!0){$("#colorPick").append('<span style="margin-top:5px">Recent:</span>');if(JSON.parse(localStorage.getItem("colorPickRecentItems"))==null||JSON.parse(localStorage.getItem("colorPickRecentItems"))==[]){$("#colorPick").append('<div class="colorPickButton colorPickDummy"></div>')}else{jQuery.each(JSON.parse(localStorage.getItem("colorPickRecentItems")),(index,item)=>{$("#colorPick").append('<div class="colorPickButton" hexValue="'+item+'" style="background:'+item+'"></div>');if(index==$.fn.colorPick.defaults.recentMax-1){return!1}})}}
$("#colorPick").fadeIn(200)},hide:function(){$("#colorPick").fadeOut(200,function(){$("#colorPick").remove();return this})},}}(jQuery))

// FUNÇÕES NORMAIS

function alterarTxt(txt, bloco, subbloco){
	$("#projeto " + bloco +" #" + subbloco).html(txt);
}

function alterarTxtAlg(alg,bloco){
	$("#projeto " + bloco).css("text-align",alg);
}

function confAtributos(bloco){
		var cod;
		$('#aba-atributos div').css("height","90%");
		$('#aba-atributos div').css("width","100%");
		$('#aba-atributos div').css("background","white");
		$('#aba-atributos div').css("border-radius","30px");
		$('#aba-atributos div').mouseleave(function(){turnBack2()});

		if(bloco == 'footer'){

			cod = '<h1>Personalize seu Rodapé</h1>';
			cod += '<p><label for="txt-autor">Nome do autor</label>';
			cod += '<input type="text" id="txt-autor" onkeyup="alterarTxt($(this).val(),\''+ bloco +'\', \'nomeAutor\')" value="'+ $("#projeto footer #nomeAutor").html() +'"></p>';
			cod += '<p><label for="txt-autor">Ano de criação</label>';
			cod += '<input type="text" id="txt-ano" onkeyup="alterarTxt($(this).val(),\''+ bloco +'\', \'ano\')" value="'+ $("#projeto footer #ano").html() +'"></p>';

			cod += '<p><label for="ft-corTxt">Cor da letra</label>';
			cod += '<div id="ft-corTxt" class="colorPickSelector"></div></p>';
			cod += '<p><label for="ft-corBg">Cor de fundo</label>';
			cod += '<div id="ft-corBg" for="footer" class="colorPickSelector"></div></p>';

			cod += '<p><label for="txt-alg">Posição do texto</label>';
			cod += '<select id="txt-alg" onchange="alterarTxtAlg($(this).val(),\''+ bloco +'\')">';
			if($("#projeto footer").css('text-align') == 'left'){
				cod += '<option value="left" selected>Esquerda</option>';
				cod += '<option value="center">Centro</option>';
				cod += '<option value="right">Direita</option>';
			}else if($("#projeto footer").css('text-align') == 'center'){
				cod += '<option value="left">Esquerda</option>';
				cod += '<option value="center" selected>Centro</option>';
				cod += '<option value="right">Direita</option>';
			}else{
				cod += '<option value="left">Esquerda</option>';
				cod += '<option value="center">Centro</option>';
				cod += '<option value="right" selected>Direita</option>';
			}
			cod += '</select></p>';
		}else if(bloco == 'header'){

			cod = '<h1>Personalize seu Cabecalho</h1>';
			cod += '<p><label for="txt-title">Nome do autor</label>';
			cod += '<input type="text" id="txt-title" onkeyup="alterarTxt($(this).val(),\''+ bloco +'\', \'titulo\')" value="'+ $("#projeto header #titulo").html() +'"></p>';

			cod += '<p><label for="cor-lt">Cor da letra</label>';
			cod += '<div id="he-corTxt" class="colorPickSelector"></div>';
			cod += '<p><label for="bg">Cor de fundo</label>';
			cod += '<div id="he-corBg" class="colorPickSelector"></div>';

			cod += '<p><label for="txt-alg">Posição do texto</label>';
			cod += '<select id="txt-alg" onchange="alterarTxtAlg($(this).val(),\''+ bloco +'\')">';
			if($("#projeto header").css('text-align') == 'left'){
				cod += '<option value="left" selected>Esquerda</option>';
				cod += '<option value="center">Centro</option>';
				cod += '<option value="right">Direita</option>';
			}else if($("#projeto header").css('text-align') == 'center'){
				cod += '<option value="left">Esquerda</option>';
				cod += '<option value="center" selected>Centro</option>';
				cod += '<option value="right">Direita</option>';
			}else{
				cod += '<option value="left">Esquerda</option>';
				cod += '<option value="center">Centro</option>';
				cod += '<option value="right" selected>Direita</option>';
			}
			cod += '</select></p>';
		}

		$('#aba-atributos div').html(cod);

		$(".colorPickSelector").colorPick({
		  'allowRecent': true,
		  'recentMax': 4,
		  'palette': ["#1abc9c", "#16a085", "#2ecc71", "#27ae60", "#3498db", "#2980b9", "#9b59b6", "#8e44ad", "#34495e", "#2c3e50", "#f1c40f", "#f39c12", "#e67e22", "#d35400", "#e74c3c", "#c0392b", "#ecf0f1", "#bdc3c7", "#95a5a6", "#7f8c8d"],
		});

		$("#ft-corTxt").colorPick({
			'initialColor': $("#projeto footer p").css('color'),
			'onColorSelected' : function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				$("#projeto footer p").css('color',this.color);
			}
		});

		$("#ft-corBg").colorPick({
			'initialColor': $("#projeto footer").css('background-color'),
			'onColorSelected' : function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				$("#projeto footer").css('background-color',this.color);
			}
		});

		$("#he-corTxt").colorPick({
			'initialColor': $("#projeto header").css('color'),
			'onColorSelected' : function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				$("#projeto header ").css('color',this.color);
			}
		});

		$("#he-corBg").colorPick({
			'initialColor': $("#projeto header").css('background-color'),
			'onColorSelected' : function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				$("#projeto header").css('background-color',this.color);
			}
		});
}



