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

function get_currency(cur){
	var tyu = JSON.parse(get_answer('https://www.cbr-xml-daily.ru/daily_json.js'));
	return tyu["Valute"][cur]["Value"];
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
