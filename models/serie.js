var mongoose = require('mongoose');

var Serie = mongoose.model('Serie', {
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
	seasons: Number,
});
