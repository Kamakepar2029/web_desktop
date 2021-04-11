<style>
.song {
    display: flex;
    background: aliceblue;
    border-bottom: 2px solid lightblue;
}

.song_right {
    flex-grow: 1;
    margin-left: 30px;
}

.song_left {
    display: flex;
    align-items: center;
    justify-content: center;
}

.song_left i {
    border-radius: 50%;
    border: 2px solid black;
    padding: 6px 8px;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Search music</title>
<meta name="viewport" content="width=device-width">
<div class="search_box">
<input type="text" id="search_input"><a class="btn" onclick="search_songs();">Find</a>
</div>
<div class="web_app_search_list" id="polling_list">
</div>
<script>
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
function playSound(url) {
    var a = new Audio(url);
    a.play();
}

function search_songs(){
	document.getElementById('polling_list').innerHTML = '';
	var search_pattern = document.getElementById('search_input').value;
	var result = JSON.parse(get_answer('https://getsong.kamakepar.repl.co/song/api/get_all?song='+search_pattern));
	var start = 0;
	var end = result.length;
	while (start < end){
		var elem = result[start];
		var template = `
	<div class="song">
	<div class="song_left" onclick="playSound('`+elem["url"]+`');">
		<i class="fa fa-play" aria-hidden="true"></i>
	</div>
	<div class="song_right">
		<div class="song__title">`+elem["title"]+`</div>
		<div class="song_artist">`+elem["artist"]+`</div>
	</div>
	</div>`;
	 document.getElementById('polling_list').innerHTML += template;
		start +=1
	}
}
</script>