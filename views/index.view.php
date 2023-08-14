
<div class="img_container">
        <a class="mobile-link" href="about/about.html">
            <img id="img" src="media/imgs/181213_Berlin_Columbiahalle_Peng_RunkewitzDSC_4099.jpg" alt="Boris Nielsen bei der Arbeit">
        </a>
    </div>
            
    <?php if(!isMobile()): ?>
        <div class ="drag_container">
        <p class="drag" id ="das">D a s</p>
        <p class="drag" id ="ist">i s t</p>
        <p class="drag" id ="eine">m e i n e</p>
        <p class="drag" id ="website">W e b s i t e</p>

    </div>
        <script> <?php echo "
const das = document.getElementById('das');
const ist = document.getElementById('ist');
const eine = document.getElementById('eine');
const website = document.getElementById('website');
const pointer_element = document.querySelector('body');
const content = document.getElementById('content');

var mousePosition;
var mousePosition2;
var mousePosition3;
var mousePosition4;

var offset = [0, 0];
var offset2 = [0, 0];
var offset3 = [0, 0];
var offset4 = [0, 0];

var isDown = false;
var isDown2 = false;
var isDown3 = false;
var isDown4 = false;


// Versuch die Positionierung über ein Array zu erreichen, schlug fehl, darum je ein eventListener pro Wort

document.addEventListener('mouseup', function () {
    isDown = false;
    isDown2 = false;
    isDown3 = false;
    isDown4 = false;
}, true);


// D A S

das.addEventListener('mousedown', function (e) {
    isDown = true;
    offset = [
        das.offsetLeft - e.clientX,
        das.offsetTop - e.clientY
    ];
}, true);


document.addEventListener('mousemove', function (event) {
    event.preventDefault();
    if (isDown) {
        mousePosition = {

            x: event.clientX,
            y: event.clientY

        };
        das.style.left = (mousePosition.x + offset[0]) + 'px';
        das.style.top = (mousePosition.y + offset[1]) + 'px';
    }
}, true);

// I S T
ist.addEventListener('mousedown', function (e) {
    isDown2 = true;
    offset = [
        ist.offsetLeft - e.clientX,
        ist.offsetTop - e.clientY
    ];
}, true);


document.addEventListener('mousemove', function (event) {
    event.preventDefault();
    if (isDown2) {
        mousePosition = {

            x: event.clientX,
            y: event.clientY

        };
        ist.style.left = (mousePosition.x + offset[0]) + 'px';
        ist.style.top = (mousePosition.y + offset[1]) + 'px';
    }
}, true);



div3 = document.createElement('div');
div3.style.position = 'absolute';
div3.style.left = '900px';
div3.style.top = '40vh';
div3.style.height = '100px';
div3.style.width = '150px';
div3.style.background = 'royalblue';
div3.style.color = 'rgb(243, 167, 179)';
div3.textContent = 'e i n e ';
div3.style.textAlign = 'center';
div3.style.fontFamily = 'Helvetica';
div3.style.fontStyle = 'italic';
div3.style.fontSize = '2rem';
div3.style.fontWeight = '800px';
div3.classList.add('headline');


content.appendChild(div3);

div3.addEventListener('mousedown', function (e) {
    isDown3 = true;
    offset3 = [
        div3.offsetLeft - e.clientX,
        div3.offsetTop - e.clientY
    ];
}, true);

document.addEventListener('mouseup', function () {
    isDown3 = false;
}, true);

document.addEventListener('mousemove', function (event) {
    event.preventDefault();
    if (isDown3) {
        mousePosition3 = {

            x: event.clientX,
            y: event.clientY

        };
        div3.style.left = (mousePosition3.x + offset3[0]) + 'px';
        div3.style.top = (mousePosition3.y + offset3[1]) + 'px';
    }
}, true);
// W E B S I T E
website.addEventListener('mousedown', function (e) {
    isDown4 = true;
    offset = [
        website.offsetLeft - e.clientX,
        website.offsetTop - e.clientY
    ];
}, true);


document.addEventListener('mousemove', function (event) {
    event.preventDefault();
    if (isDown4) {
        mousePosition = {

            x: event.clientX,
            y: event.clientY

        };
        website.style.left = (mousePosition.x + offset[0]) + 'px';
        website.style.top = (mousePosition.y + offset[1]) + 'px';
    }
}, true);





const div5 = document.createElement('div');
div5.style.position = 'absolute';
div5.style.left = '260px';
div5.style.top = '45vh';
div5.innerHTML = 'du kannst mich verschieben! &#10157;';
div5.style.width = '250px';
div5.style.height = '100px';
div5.style.background = 'royalblue';
div5.style.color = 'rgb(243, 167, 179)';
div5.style.textAlign = 'center';
div5.style.fontFamily = 'Helvetica';
div5.style.fontStyle = 'italic';
div5.style.fontSize = '1rem';
div5.classList.add('satz');

content.appendChild(div5);
</script>

        "; ?>
        </script>
        <?php endif ?>
    