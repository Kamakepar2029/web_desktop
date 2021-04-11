<head>
<title>WInix</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<script>
var y = localStorage.getItem('background_url');
if (y){
document.body.style="background:url('"+y+"');";
}
</script>
<div class="body__inner">
<div class="app">
		<a class="app" onclick="fullscreen3();">
			<img src="icons/fullscreen.svg" class="app_icon">
			<div class="app_title">
				FullScreen
			</div>
		</a>
	</div>


	<div class="app">
		<a class="app" onclick="show_app('paint');" onmousedown="showCoords(event);">
			<img src="icons/paint.png" class="app_icon">
			<div class="app_title">
				Paint
			</div>
		</a>
	</div>

	<div class="app">
		<a class="app" onclick="show_app('firefox');" onmousedown="showCoords(event);">
			<img src="icons/mozilla.svg" class="app_icon">
			<div class="app_title">
				Firefox
			</div>
		</a>
	</div>

	<div class="app">
		<a class="app" onclick="show_app('wordpad');">
			<img src="icons/wordpad.png" class="app_icon">
			<div class="app_title">
				Wordpad
			</div>
		</a>
	</div>

	<div class="app">
		<a class="app" onclick="show_app('drive');">
			<img src="icons/google-drive.png" class="app_icon">
			<div class="app_title">
				 Drive
			</div>
		</a>
	</div>
</div>
<div class="down">
	<div class="left__button" onclick="show_dialog();">
		<i class="fa fa-linux"></i>
	</div>
	<div class="opened_apps">
	
	</div>
	<div class="timeanddate" onclick="show_change_background_dialog();">
		<div class="time"></div>
		<div class="date"></div>
	</div>
</div>
<!---
<div class="dialog">
<div class="dialog__title"><div class="dialog__title__text">Linux Helper</div><div class="dialog__close"><i class="fa fa-times"></i></div></div>
<div class="dialog__content">
	<div class="dialog__content">
    <div class="dialog__neural" onclick="start_recognise();">
        <div class="dialog__neural_btn1"></div>
        <div class="dialog__neural_btn2"></div>
        <div class="dialog__neural_btn3"></div>
        <div class="dialog__neural_btn4"></div>
        <div class="dialog__neural_btn5"></div>
    </div>
	</div>
</div>
</div>
---->

<script>
function playSound(url) {
    var a = new Audio(url);
    a.play();
}
function get_answer(url){
var xhr = new XMLHttpRequest();
xhr.open('GET', url, false);
xhr.send();
if (xhr.status != 200) {
return 'Проблема с подключением';
} else {
return( xhr.responseText );
}
}

function close_dialog(id){
	document.getElementById(id).remove();
}

function get_currency(cur){
	var tyu = JSON.parse(get_answer('https://www.cbr-xml-daily.ru/daily_json.js'));
	return tyu["Valute"][cur]["Value"];
}

function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

function show_dialog(){
	let uniqid = makeid(10);
	var dialog = `
	<div class="dialog" id="`+uniqid+`">
<div class="dialog__title" id="top_`+uniqid+`"><div class="dialog__title__text">Cyber Voice Assistant</div><div class="dialog__close" onclick="close_dialog('`+uniqid+`');"><div class="cross">+</div></div></div>
<div class="dialog__content">
	<div class="dialog__content">
    <div class="dialog__neural" onclick="start_recognise();" id="micro_`+uniqid+`">
        <div class="dialog__neural_btn1"></div>
        <div class="dialog__neural_btn2"></div>
        <div class="dialog__neural_btn3"></div>
        <div class="dialog__neural_btn4"></div>
        <div class="dialog__neural_btn5"></div>
    </div>
	</div>
</div>
</div>
	`;
	let div = document.createElement('div');
	div.innerHTML = dialog;
	 document.body.append(div);
	 dragMaster1.makeDraggable(document.getElementById(uniqid));
	//document.body.innerHTML = document.body.innerHTML+dialog;
}

function show_dialog_poi( text ){
	let uniqid = makeid(10);
	var dialog = `
	<div class="dialog" id="`+uniqid+`" style="height: 30%;">
<div class="dialog__title" id="top_`+uniqid+`"><div class="dialog__title__text">Window notify</div><div class="dialog__close" onclick="close_dialog('`+uniqid+`');"><div class="cross">+</div></div></div>
	<div class="dialog__content">
		`+text+`
	</div>
</div>
	`;
	let div = document.createElement('div');
	div.innerHTML = dialog;
	 document.body.append(div);
	 dragMaster1.makeDraggable(document.getElementById(uniqid));
	//document.body.innerHTML = document.body.innerHTML+dialog;
}



function show_app(id){
	if (id == 'paint'){
		let uniqid = makeid(10);
	var dialog = `
	<div class="dialog" id="`+uniqid+`" style="height: 80%;">
<div class="dialog__title" id="top_`+uniqid+`"><div class="dialog__title__text">Paint</div><div class="dialog__close" onclick="close_dialog('`+uniqid+`');"><div class="cross">+</div></div></div>
	<div class="dialog__content paint_name">
		
	</div>
</div>
	`;
	let div = document.createElement('div');
		div.innerHTML = dialog;
	 	document.body.append(div);
		var paint = new PaintJS({
        paint: document.getElementsByClassName('paint_name')[0],
				brushSize: 35, // 8 is default
    brushColor: "#1e1d1d", //  hexadecimal value, default #000
    paletteColors: [ // array of color shortcut, so that user does not have to use colorpicker for everything
    "#ffffff",
    "#000000",
    "#808080"
    ] // or document.getElementById("paint")
    });
	}
	if ('wordpad' == id){
		let uniqid = makeid(10);
	var dialog = `
	<div class="dialog" id="`+uniqid+`" style="height: 80%;">
<div class="dialog__title" id="top_`+uniqid+`"><div class="dialog__title__text">Wordpad</div><div class="dialog__close" onclick="close_dialog('`+uniqid+`');"><div class="cross">+</div></div></div>
	<div class="dialog__content `+uniqid+`_text">
		
	</div>
</div>
	`;
	let div = document.createElement('div');
		div.innerHTML = dialog;
	 	document.body.append(div);
		 var selector_name = '.'+uniqid+'_text';
		tinymce.init({ selector:selector_name });
		dragMaster1.makeDraggable(document.getElementById(uniqid));
	}
}

function show_change_background_dialog(){
	var back_url_stand = '';
	var y = localStorage.getItem('background_url');
	if (y){
		back_url_stand = y;
	}else{
		back_url_stand = 'https://wallpaperaccess.com/full/1965031.jpg';
	}
	var dia = `<div class="notify_background_change" id="notify_background">
    <p class="back_chnge_d">Time to change background!</p>
        <input id="notify__background_url" value="`+back_url_stand+`" placeholder="Enter url to the background.">
        <a class="confirm__btn" onclick="save_background();">Save</a>
    </div>`;
	let div = document.createElement('div');
	div.innerHTML = dia;
	document.body.append(div);
	dragMaster1.makeDraggable(document.getElementById('notify_background'));
}

function save_background(){
	localStorage.setItem('background_url', document.getElementById('notify__background_url').value);
	alert('Background successfully changed ! Reload page please ;-)');
	document.getElementById('notify_background').remove();
}

function email_me(send_email){

}

function playSound_new(url){
  var audio = document.createElement('audio');
  audio.style.display = "none";
  audio.src = url;
  audio.autoplay = true;
  audio.onended = function(){
    audio.remove() //Remove when played.
  };
  document.body.appendChild(audio);
}

function speak(text){
	let url = 'https://www.google.com/speech-api/v2/synthesize?enc=mpeg&client=chromium&key=AIzaSyBOti4mM-6x9WDnZIjIeyEU21OpBXqWBgw&text='+encodeURI(text)+'&lang=ru-RU&speed=0.45&pitch=0.3';
	playSound_new(url);
}

speak('Привет');

function what_to_say(text){
	if (text == 'кибер покажи мне курс доллара'){
			console.log(String(get_currency('USD')));
			speak('Доллар стоит '+String(get_currency('USD'))+' рублей.');
			show_dialog_poi('1 $ = '+String(get_currency('USD'))+' Руб.');
	}
}

function get_swer(question){
var xhr = new XMLHttpRequest();
xhr.open('GET', '/backend/process.php', false);
xhr.send();
if (xhr.status != 200) {
return 'Проблема с подключением';
} else {
return( xhr.responseText );
}
}
function ask(){
	var text = '';
	
	//get_answer
}
function showCoords(evt){
  console.log(
    "clientX value: " + evt.clientX + "\n" +
    "clientY value: " + evt.clientY + "\n"
  );
}

function start_recognise(){
document.getElementsByClassName('dialog__neural')[0].style="animation: 3s animation_voice infinite;";
var recognizer = new webkitSpeechRecognition();
recognizer.interimResults = true;
//window.navigator.language.slice(0, 2)
recognizer.lang = 'ru-Ru';
recognizer.onresult = function (event) {
  var result = event.results[event.resultIndex];
  if (result.isFinal) {
    console.log('Вы сказали: ' + result[0].transcript);
		let result_text = result[0].transcript.toLowerCase();
		console.log('"'+result_text+'"');
		document.getElementsByClassName('dialog__neural')[0].style="animation: 3s animation_voice;";
		what_to_say(result_text);
  } else {
    console.log('Промежуточный результат: ', result[0].transcript);
  }
};
recognizer.start();
}
</script>

<script> 
    function zero_first_format(value)
    {
        if (value < 10)
        {
            value='0'+value;
        }
        return value;
		}
    function date_time()
    {
        var current_datetime = new Date();
        var day = zero_first_format(current_datetime.getDate());
        var month = zero_first_format(current_datetime.getMonth()+1);
        var year = current_datetime.getFullYear();
        var hours = zero_first_format(current_datetime.getHours());
        var minutes = zero_first_format(current_datetime.getMinutes());
        return hours+":"+minutes;
    }
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1;

		var yyyy = today.getFullYear();
		if(dd<10){dd='0'+dd}
		if(mm<10){mm='0'+mm}
		var today = dd+'.'+mm+'.'+yyyy;
		document.getElementsByClassName('date')[0].innerHTML = today;
    function Say(){
    document.getElementsByClassName('time')[0].innerHTML = date_time();
		}
    setInterval(Say, 500);
</script>

<script type="text/javascript"><!--
//Ищем правильный метод
function fullscreen3() {
	var element = document.documentElement;
  if(element.requestFullScreen) {
    element.requestFullScreen();
  } else if(element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if(element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }
}

//псевдокласс
//:-webkit-full-screen {  background: pink;}

//fullscreen3(document.documentElement); //вся страница
//fullscreen3(document.getElementById("videoElement")); //какой-то определенный элемент
//--></script>
<script type="text/javascript" src="js/jscolor.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/paint.js"></script>
<script type="text/javascript" src="js/drop.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="js/editor.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script></script>
<script type="text/javascript" src="js/fixEvent.js"></script>
<script>
$(document).ready(function() {
    var dragObjects = document.getElementsByClassName('app')
    for(var i=0; i<dragObjects.length; i++) {
        dragMaster1.makeDraggable(dragObjects[i])
    }
})

</script>

<!----
`$(document).mousemove(
    function(event){
	document.getElementById('mouseX').value = event.pageX
	document.getElementById('mouseY').value = event.pageY
    }
)

document.onmousemove = mouseMove

function mouseMove(event){ 
	event = fixEvent(event)
	document.getElementById('mouseX').value = event.pageX
	document.getElementById('mouseY').value = event.pageY
}` 
--->