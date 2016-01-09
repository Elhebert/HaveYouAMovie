
//	-- Mondules
var express        = require('express');
var app            = express();
var mongoose       = require('mongoose');
var morgan         = require('morgan');
var bodyParser     = require('body-parser');
var methodOverride = require('method-override');

//	-- Config
var db   = require('./config/db');
mongoose.connect(db.url);

var port = process.env.PORT || 1234;

app.use(bodyParser.json());
app.use(bodyParser.json({ type: 'application/vnd.api+json' }));
app.use(bodyParser.urlencoded({'extended':'true'}));

app.use(methodOverride('X-HTTP-Method-Override'));

app.use(express.static(__dirname + '/public'));
app.use('/bower_components', express.static(__dirname + '/bower_components'));

//	-- Routes
require('./routes/index')(app);

//	-- App
app.listen(port);
console.log('App on port : ' + port);

exports = module.exports = app;
