<div class="flexcontainer" id="flexcontainer">
            
        
    <div class="container">
        <div class="buttons">
            <button id="stein">Stein</button>
            <button id="schere">Schere</button>
            <button id="papier">Papier</button>
        </div>
    </div>
<div class="idcontainer" id="idcontainer">
    <div id="reset"></div>
    <div id="spielerWahl"></div>
    <div id="computerWahl"></div>
    <div id="current">&nbsp</div>
    <div id="result"></div>
    <div id="gameCount"></div>
</div>
</div>

<script>

    let wins = 0;
let loss = 0;
let gameCountPlayer = 0;
let gameCountComputer = 0;


const playButtons = document.querySelectorAll('button');
const result = document.getElementById('result');
const points = document.getElementById('points');
const current = document.getElementById('current');
const reset_button = document.createElement('button'); 
const container = document.querySelector('container');
const reset = document.getElementById('reset');
const gameCount = document.getElementById('gameCount');
const flexcontainer = document.getElementById('flexcontainer');
const computerWahl = document.getElementById('computerWahl');
const spielerWahl = document.getElementById('spielerWahl');
const idContainer = document.getElementById('idcontainer');

result.style.textAlign = "center"
computerWahl.style.textAlign = "center"
current.style.textAlign = "center"
spielerWahl.style.textAlign = "center"

gameCount.style.fontFamily = "monospace"
gameCount.style.fontSize = "2rem"

reset.addEventListener('click', resetGame)



 playButtons.forEach((button) => {
     button.addEventListener('click', (e)=> {
         game(e.target.innerHTML.toLowerCase(), computerPlay())
     })
});


function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
    }

function computerPlay(){
        let r = "Stein";
        let p = "Papier";
        let s = "Schere";
        let answer = [r, p, s];
        let i = getRandomInt(0,3);
    computerWahl.innerHTML = 'Boris wählt: '  + answer[i];
        return answer[i].toLowerCase();
    }

function getPlayerSelection(playerSelection) {
    return playerSelection;
}

function resetGame(){
    wins = 0;
    loss = 0;
    playerSelection = "";
    answer = [];
    current.textContent = "-"
    result.innerHTML = "Spieler: 0 <br> Boris: 0";
    playButtons.forEach((button) => {
        
    })
     playButtons.forEach((button) => {
                    button.style.visibility = "visible";
        })
        reset.removeChild(reset_button)

}

function game(a, b) {
    console.log(a,b)

    if(a === b) {
        let sP = a.charAt(0).toUpperCase() + a.slice(1);
        let cP = b.charAt(0).toUpperCase() + b.slice(1);
        current.innerHTML = "Unentschieden! <br> " + sP + " und " + cP;
    }
    else if(a === "stein" && b === "schere") {
        current.innerHTML = "Gewonnen! <br> Stein schlägt Schere!";
        wins += 1;
    }else if(a == "papier" && b == "stein") {
        current.innerHTML = "Gewonnen! <br> Papier schlägt Stein!";
        wins+= 1;
    }else if(a == "schere" && b == "papier") {
        current.innerHTML = "Gewonnen! <br> Schere schlägt Papier!";
        wins+= 1;
    }else if(a == "stein" && b == "papier") {
        current.innerHTML = "Verloren! <br> Papier schlägt Stein!";
        loss+= 1;
    }else if(a =="papier" && b == "schere") {
        current.innerHTML = "Verloren! <br> Schere schlägt Papier!";
        loss+= 1;
    }else if(a =="schere" && b =="stein") {
        current.innerHTML = "Verloren! <br> Stein schlägt Schere!";
        loss+= 1;
    }
    const gross = a.charAt(0).toUpperCase() + a.slice(1);
    spielerWahl.textContent = "Du wählst: " + gross;
    result.innerHTML = "Du: " + wins + "<br> Boris: " + loss;
    
    if(wins + loss == 5){
        result.textContent = 'Spielende'
        if (wins > loss) {
            gameCountPlayer += 1;
            result.textContent = "Du hast mit " + wins + " zu "+ loss + " gewonnen!";
            current.textContent = "Glückwunsch!"
            gameCount.textContent = gameCountPlayer + " : " + gameCountComputer;

        }else{
            gameCountComputer += 1;
            result.textContent = "Du hast mit " + wins + " zu " + loss + " verloren.";
            current.textContent = "Probier's nochmal!"
            
        }
        playButtons.forEach((button) => {
                    button.style.visibility = "hidden";
        })
        reset.appendChild(reset_button);        
        reset_button.textContent = "Nochmal";        
        reset_button.classList.add('reset');
        reset_button.style.display = "visible";

        gameCount.textContent = "Du " + gameCountPlayer + "  Boris " + gameCountComputer;
        return;
    }
}

</script>
