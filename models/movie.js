var mongoose = require('mongoose');

module.exports = mongoose.model('movie', {
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
