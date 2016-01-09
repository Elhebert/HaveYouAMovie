var Serie = require('../models/serie');
var _ = require('underscore');

module.exports = function(app) {
	app.get('/api/series', function(req, res) {
		Serie.find(function(err, series){
			if (err)
				res.send(err);
			res.status(200).json(series);
		});
	});

	app.post('/api/series', function(req, res) {
		var serie = new Serie(req.body);
		serie.save(function(err) {
			if (err)
				res.send(err);
			res.status(200).json(serie);
		});
	});

	app.get('/api/series/:id', function(req, res) {
		Serie.findById(req.params.id, function(err, serie){
			if (err)
				res.send(err);
			res.status(200).json(serie);
		});
	});

	app.put('/api/series/:id', function(req, res) {
		Serie.findById(req.params.id, function(err, serie) {
			if (err)
				res.send(err);
			serie = _.extend(serie, req.body);
			serie.save(function(err){
				if(err)
					res.send(err);
				res.status(200).json(serie);
			});
		});
	});

	app.delete('/api/series/:id', function (req, res) {
		Serie.findByIdAndRemove(req.params.id, {}, function (err, obj) {
			if (err)
				res.send(err);
			res.status(200).json(obj);
		});
	});
};
