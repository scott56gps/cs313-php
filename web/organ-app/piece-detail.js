var clockDisplay = document.getElementById('clockDisplay')
var practiceTimeSubmit = document.getElementById('practiceTime')
var practiceDateSubmit = document.getElementById('practiceDate')
var startButton = document.getElementById('startButton')
var stopButton = document.getElementById('stopButton')
var clearButton = document.getElementById('clearButton')
var seconds = 0
var minutes = 0
var hours = 0
var t;
var currentDate = new Date();
currentDate = currentDate.toISOString().split('T')[0];

function add() {
	seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }

    var currentTime = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
    clockDisplay.innerHTML = currentTime
    practiceTimeSubmit.value = currentTime

	timer();
}

function timer() {
    t = setTimeout(add, 1000);
}

practiceDateSubmit.value = currentDate

startButton.addEventListener('click', () => {
    timer();
});
stopButton.addEventListener('click', () => {
    clearTimeout(t);
});
clearButton.addEventListener('click', () => {
    clockDisplay.innerHTML = "00:00:00";
    seconds = 0;
    minutes = 0;
    hours = 0;
});