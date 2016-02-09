var searchButton = document.querySelector('#searchbtn');


function sendSearch(evt) {
	evt.preventDefault()
	var search_term = {
		q: 'Bowery'
	};
	console.dir(search_term);

	// var keyword = Object.keys(search_term).map(function(k) {
	// return encodeURIComponent(k) + '=' + encodeURIComponent(search_term[k]);

	var apiURL = 'https://www.api.twitter.com/1.1/search/tweets.json?q=Bowery'// + keyword.toString()

	console.dir(apiURL);


	xhr('GET', apiURL);
	//})

}

searchButton.addEventListener('click', sendSearch)





var xhr = function(method, path) {
	var request = new XMLHttpRequest()
	request.open(method, path, true)
	// request.onreadystatechange = function () {
	// 	if (request.readyState !==4) {return}

	// 	if (request.readyState ==4 && (request.status !== 200 && request.status !== 201)) {
	// 		callback(new Error('XHR Failed: ' + path), null)
	// 	}

	// 	callback(null, JSON.parse(request.responseText))
	// }
	
	request.send()
}

