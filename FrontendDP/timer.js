$(document).ready(function() {

	(new Timer('#timer-1')).boot(5, 0, 0.01);

})

var Timer = function(selector) {

	var self = this;

	self._selector = $(selector);

	self.tick = function() {
		var ticker = setInterval(function() {

			self._currentValue -= self._tickFrequency;

			if (self._currentValue <= self._stopValue) {
				clearInterval(ticker);

				$.get('http://localhost:3000/meaningOfLife', function(response) {



					var MoL = typeof response == 'object' ? response[0] : JSON.parse(response)[0];
					self._selector.text(MoL);
					$('.teaser').hide();

				})

			}

			self._selector.text(self._currentValue.toFixed(2));

		}, self._tickFrequency * 1000)
	}
	self.boot = function(initValue, stopValue, tickFrequency) {
		self.initialize(initValue, stopValue, tickFrequency);
		self.tick();
	}
	self.initialize = function(initValue, stopValue, tickFrequency) {
		self._tickFrequency = tickFrequency;
		self._initValue = initValue;
		self._stopValue = stopValue;
		self._currentValue = self._initValue;
		self._selector.text(self._currentValue);
	}
}