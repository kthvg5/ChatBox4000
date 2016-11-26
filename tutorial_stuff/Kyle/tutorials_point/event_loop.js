/*
// Import events module
var events = require('events');

// Create an eventEmitter object
var eventEmitter = new events.EventEmitter();

// create an event handler ass follows
var connectHandler = function connected(){
	console.log('connection successful.');

	// Fire the data_recieved event
	eventEmitter.emit('data_recieved');
}

// Bind the connection event with the handler
eventEmitter.on('connection', connectHandler);

// Bind the data_recieved event withthe anonymous function
eventEmitter.on('data_recieved', function(){
	console.log('data recieved successfully.');
});

// Fire the connection event
eventEmitter.emit('connection');

console.log("Program Ended");
*/

var fs = require("fs");

fs.readFile('input.txt', function(err, data){
	if (err){
		console.log(err.stack);
		return;
	}
	console.log(data.toString());
});

console.log("Program Ended");