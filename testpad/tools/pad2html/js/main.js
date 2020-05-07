var main, content
var urlPad = 'https://annuel.framapad.org/p/pad2html' 

function getPad(padUrl) {
	var xhr = new XMLHttpRequest()
	xhr.open('GET', padUrl + '/export/txt')
	xhr.send(null)
	xhr.onreadystatechange = function () {
		var DONE = 4
		var OK = 200
		if (xhr.readyState === DONE) {
			if (xhr.status === OK) {
				console.log(xhr)
				var converter = new showdown.Converter()
				var html = converter.makeHtml(xhr.responseText);
				main.innerHTML = html 
			} else {
				console.log('Error: ' + xhr.status)
			}
		}
	}
}

window.addEventListener('DOMContentLoaded', function(){
	main 		= document.querySelector('main')
	getPad(urlPad)
})
