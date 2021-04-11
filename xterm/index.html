<!doctype html>
  <html>
    <head>
    <meta name="viewport" content="width=device-width">
      <link rel="stylesheet" href="/xterm/xterm.css" />
      <script src="https://compare.kamakepar.repl.co/xterm/lib/xterm.js"></script>
    </head>
    <body>
    <style>
    .terminal{
      height: 100% !important;
    width: 100% !important;
    }
    html {
    height: 100%;
    width: 100%;
}
    body{
      margin:0px;
      height:100%;
      width:100%;
      background:black;
    }
    #terminal{
      height: -webkit-fill-available;
    width: -webkit-fill-available;
    }
    </style>
      <div id="terminal"></div>
      <script>
			const docu = document.location.href;
			var docs_mass = docu.split('/');
			if( docu.includes(':')){
				mao = docu.split(':');
				if (mao[2]){
				alls = ':'+mao[2];
				}else{
					alls = '';
				}
			}else{
				alls = '';
			}
        const term = new Terminal();
    //const socket = new WebSocket('/term');
		if (docs_mass[0] == 'https:'){
		var construct = 'wss://remotebash.kamakepar.repl.co:443/term';
		}else{
		var construct = 'ws://'+docs_mass[2]+alls+'/term';
		}
		console.log(construct);
    const socket = new WebSocket(construct);
        term.open(document.getElementById('terminal'));
        term.onData(function(data){
        console.log(data)
        socket.send(data)
    })

    socket.addEventListener('message', function (event) {
        console.log('>', event)
        term.write(event.data);
    });
      </script>
    </body>
  </html>