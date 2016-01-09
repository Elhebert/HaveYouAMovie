var mongoose = require('mongoose');

module.exports = mongoose.model('serie', {
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
