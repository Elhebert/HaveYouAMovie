var mongoose = require('mongoose');

var Movie = mongoose.model('Movie', {
	title: {
		type: String,
		required: true
	},
	genre: {
		type: String,
		required: true
	},
	actors: Array,
	synopsis: {
		type: String,
		required: true
	},
	thumbnail: String,
	trailerUrl: String,
	year: Number,
});
