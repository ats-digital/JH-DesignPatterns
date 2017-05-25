$ = jQuery = function(selector) {
	return new jQuery.fn.init(selector);
}

jQueryDOMElement = function(nodeList) {

	this.nodeList = nodeList;

	this.text = function(text) {

		if (text) {
			this.getFirst().innerText = text;
		}

		return this.getFirst().innerText;
	}

	this.hide = function() {
		this.getFirst().style.visibility = 'hidden';
	}

	this.html = function(html) {

		if (html) {
			this.getFirst().innerHTML = text;
		}

		return this.getFirst().innerHTML;
	}

	this.getFirst = function() {

		if (this.nodeList.length) {
			return this.nodeList[0];
		}

	}

	return this;

}


jQuery.fn = jQuery.prototype = {

	constructor: jQuery,

	init: function(selector) {

		if (typeof selector == 'string') {
			return new jQueryDOMElement(document.querySelectorAll(selector));
		}


		return this;
	},

	eq: function(index) {

		if (this.selector) {
			return this.selector[index] === undefined ? [] : this.selector[index];
		}

		return [];

	},

	ready: function(closure) {
		document.addEventListener("DOMContentLoaded", closure);
	},
}


jQuery.ajax = function(options, closure) {

	xhr = new XMLHttpRequest();

	var method = options.method || 'GET';

	xhr.open(method, options.url);

	if (options.headers) {

		options.headers.forEach(function(name, value) {
			xhr.setRequestHeader(name, value);
		})

	}

	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			closure(xhr.responseText);
		}
	};
	xhr.open(method, options.url, true);
	xhr.send();

}

jQuery.get = function(url, closure) {
	return jQuery.ajax({
		url: url
	}, closure);
}

jQuery.fn.init.prototype = jQuery.fn;