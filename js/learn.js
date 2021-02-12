(function(L) {
	L = L || {};
	L.synth;
	L.voice;
	L.letterRate = .5;
	L.sentenceRate = .75;
	L.pitch = 1.5;

	L.init = function() {
		L.synth = window.speechSynthesis;
		
		L.setVoice();
		L.saySomething(' ', L.letterRate);
		L.setupEventHandlers();
	};
	
	L.setVoice = function() {
		var voices = L.synth.getVoices();
		
		// set to the first voice for now
		L.voice = voices[0];
	};
	
	L.saySomething = function(textToSpeak, rate) {
		var utterance = new SpeechSynthesisUtterance(textToSpeak);
		utterance.voice = L.voice;
		utterance.pitch = L.pitch;
		utterance.rate = rate;
		L.synth.speak(utterance);
	};
	
	L.setupEventHandlers = function() {
		var buttons = document.querySelectorAll('button.next');
		buttons.forEach((button) => {
			button.addEventListener('click', function(event){L.showNextSlide(event)});
		});
		
		var letters = document.querySelectorAll('.screen.letter-screen .letter');
		letters.forEach((letter) => {
			var letterToSpeak = letter.textContent.substring(0, 1);
			
			letter.addEventListener('click', function(event){L.speakLetter(letterToSpeak)});
		});
		
		var descriptions = document.querySelectorAll('.screen .letter-description');
		descriptions.forEach((description) => {
			var textToSpeak = description.getAttribute('data-speech-content');
			description.addEventListener('click', function(event){L.speakLetterDescription(textToSpeak)});
		});
	};
	
	L.showNextSlide = function(event) {
		var nextSlideName = event.target.getAttribute('data-next-slide');
		L.showSlideByName(nextSlideName);
	};
	
	L.showSlideByName = function(slideName) {
		var allSlides = document.querySelectorAll('.screen');
		allSlides.forEach((slide) => {
			slide.setAttribute('hidden', 'true');
		});

		
		var slideToShow = document.querySelector(`.screen.${slideName}`);
		slideToShow.removeAttribute('hidden');
	};
	
	L.speakLetter = function(letterToSpeak) {
		L.saySomething(letterToSpeak, L.letterRate);
	};
	
	L.speakLetterDescription = function(descriptionToSpeak) {
		L.saySomething(descriptionToSpeak, L.sentenceRate);
	};
})(window.L = window.L || {});
