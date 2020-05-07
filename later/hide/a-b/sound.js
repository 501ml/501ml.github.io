function play(index){
var audio = document.getElementById("audio"+index);
audio.play();
audio.currentTime = 0;
}
