module.exports = function (app) {

	require('./movies')(app);
	require('./series')(app);

};
