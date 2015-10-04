var Movie = require('../models/movie');
var _ = require('underscore');

module.exports = function(app) {

	app.get('/api/movies', function(req, res) {
		Movie.find(function(err, movies){
			if (err)
				res.send(err);
			res.status(200).json(movies);
		});
	})

	.post('/api/movies', function(req, res) {
		var movie = new Movie(req.body);
		movie.save(function(err) {
			if (err)
				res.send(err);
			res.status(200).json(movie);
		});
	})

	.get('/api/movies/:id', function(req, res) {
		Movie.findById(req.params.id, function(err, movie){
			if (err)
				res.send(err);
			res.status(200).json(movie);
		});
	})

	.put('/api/movies/:id', function(req, res) {
		Movie.findById(req.params.id, function(err, movie) {
			if (err)
				res.send(err);
			movie = _.extend(movie, req.body);
			movie.save(function(err){
				if(err)
					res.send(err);
				res.status(200).json(movie);
			});
		});
	})

	.delete('/api/movies/:id', function (req, res) {
		Movie.findByIdAndRemove(req.params.id, {}, function (err, obj) {
			if (err)
				res.send(err);
			res.status(200).json(obj);
		});
	});
};
