    <div class="platzhalter"></div>
    <div class="musik_container">
        
        <div class="audio-player">
            <p>Ecktown</p>
            <audio controls preload="none" controlsList="nodownload">
                <source src="media/audio/Ecktown 1.mp3" type="audio/mpeg" />
                Ihr Browser unterstÃ¼tzt nicht dieses Audio Element
            </audio>
            <p>Gletscherfunk</p>
            <audio controls preload="none" controlsList="nodownload">
                <source src="media/audio/Gletscherfunk.m4a" type="audio/mpeg" />
                Ihr Browser unterstÃ¼tzt nicht dieses Audio Element
            </audio>
            <p>Mettenhof</p>
            <audio controls preload="none" controlsList="nodownload">
                <source src="media/audio/Mettenhov_l.m4a" type="audio/x-m4a" />
            </audio>
            <p>Hips-Hop</p>
            <audio controls preload="none" controlsList="nodownload">
                <source src="media/audio/FMollHipHop.mp3" type="audio/x-m4a" />
            </audio>
            <p>Musik im Fahrstuhl</p>
            <audio controls preload="none" controlsList="nodownload">
                <source src="media/audio/Wartemusik.m4a" type="audio/x-m4a" />
            </audio>
            <!--controls controlsList="nodownload" -->
        </div>
    </div>

<script>
    function onlyPlayOneIn(container) {
  container.addEventListener("play", function(event) {
  audio_elements = container.getElementsByTagName("audio")
    for(i=0; i < audio_elements.length; i++) {
      audio_element = audio_elements[i];
      if (audio_element !== event.target) {
        audio_element.pause();
      }
    }
  }, true);
}

document.addEventListener("DOMContentLoaded", function() {
  onlyPlayOneIn(document.body);
});
</script>
