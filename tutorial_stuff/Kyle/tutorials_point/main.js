var http = require("http");


http.createServer(function (request, response){
	// Send the HTTP header
	// HTTP status: 200: OK
	// COntent Type: text/plain
	response.writeHead(200, {'Content-Type': 'text/plain'});

	// send the response to the body as "Helo World"
	response.end('HelloWorld');
}).listen(8081);

// Console will print this message
console.log('Server running at http://127.0.0.1:8081/');
