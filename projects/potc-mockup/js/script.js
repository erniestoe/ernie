const audio = document.getElementById('ship-sound');
const button = document.getElementById('audio-toggle');

button.addEventListener('click', () => {
    if (audio.paused) {
        audio.play();
        button.textContent = 'Pause Sound';
    } else {
        audio.pause();
        button.textContent = 'Play Sound';
    }
});
