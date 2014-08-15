<script type="text/javascript">
function diceRandom(){

	var randomNumber = (Math.floor(Math.random() * 6)) + 1;
	return randomNumber;

}



var  playerSum = 0;
var computerSum = 0;
var roundPlayerSum = 0;
var roundComputerSum = 0;
var playerDice1 = 0;
var playerDice2 = 0;
var computerDice1 = 0;
var computerDice2 = 0;
var computerDouble = 0;
var playerDouble = 0;
var winningNumber = 100;


function runRandom(){



if (playerSum >= winningNumber)
{
		
	alert("Congratulations! You won the game!");
	window.location = 'beTheRoll.html';
	return;

}


if (computerSum >= winningNumber)
{
		
	alert("I'm Sorry you lost the game!");
	window.location = 'beTheRoll.html';
	return;

}

	playerDice1 = diceRandom();
	playerDice2 = diceRandom();
	computerDice1 = diceRandom();
	computerDice2 = diceRandom();
	roundPlayerSum = playerDice1 + playerDice2;
	roundComputerSum = computerDice1 + computerDice2;

function results(){

	document.getElementById("diceP1").innerHTML = ("<img src=rollingdice/" + playerDice1 + ".png />");
	document.getElementById("diceP2").innerHTML = ("<img src=rollingdice/" + playerDice2 + ".png />");
	document.getElementById("diceP3").innerHTML = ("<img src=rollingdice/" + computerDice1 + ".png />");
	document.getElementById("diceP4").innerHTML = ("<img src=rollingdice/" + computerDice2 + ".png />");
	

	document.getElementById("youRolled").innerHTML = ("You rolled a total of " + roundPlayerSum);
	document.getElementById("computerRolled").innerHTML = ("Computer rolled a total of " + roundComputerSum);
}

/* DRAW */
if (roundPlayerSum == roundComputerSum)
{

		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
						document.getElementById("diceReplace").innerHTML = ("");
						results();
						document.getElementById("resultsd").innerHTML = ("<h3>This game is a tie so nobody wins!</h3>");
		},5000);
}

if (roundPlayerSum > roundComputerSum)
{


		if (playerDice1 == playerDice2)
		{
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
					document.getElementById("diceReplace").innerHTML = ("");
					results();
					document.getElementById("resultsd").innerHTML = ("<h4>You win this round with a double! So your points are doubled!</h4>");
					playerDouble = (playerDice1 + playerDice2) * 2;
					playerSum = playerSum + playerDouble;
					document.getElementById("scoreBox").innerHTML = "<h2>" + playerSum + "</h2>";	
		},5000);

		}else{
		
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
					document.getElementById("diceReplace").innerHTML = ("");
					results();
					document.getElementById("resultsd").innerHTML = ("<h3>You win this round!</h3>");
					playerSum = playerSum + playerDice1 + playerDice2;
					document.getElementById("scoreBox").innerHTML = "<h2>" + playerSum + "</h2>";
		},5000);
	
		}

}


if (roundComputerSum > roundPlayerSum) 
{

		if (computerDice1 == computerDice2)
		{
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
						document.getElementById("diceReplace").innerHTML = ("");
						results();
						document.getElementById("resultsd").innerHTML = ("<h3>Computer wins this round with a double! So the points are doubled!</h3>");
						computerDouble = (computerDice1 + computerDice2) * 2;
						computerSum = computerSum + computerDouble;
						document.getElementById("scoreBox2").innerHTML = "<h2>" + computerSum + "</h2>";
		},5000);
	
		}else{
		
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
						document.getElementById("diceReplace").innerHTML = ("");
						results();
						document.getElementById("resultsd").innerHTML = ("<h3>Computer wins this round!</h3>");
						computerSum = computerSum + computerDice1 + computerDice2;
						document.getElementById("scoreBox2").innerHTML = "<h2>" + computerSum + "</h2>";
		},5000);



		}

}	



}





</script>

<div class="bodytopG">
	<div class="bodytopadjG">
		<p><h1>Rolling Dice</h1></p>
		<br />
		<p>Do you think you are good at rolling the dice? Or just lucky in general? Show us what you got!</p>
		<br />
		<hr />
	</div>
</div>

<div class="containerx">
<div class="bodylow">
<ul>

<li>
	<!-- PLAYER -->
	<div id="wrapperPlayer">

		<p><h3>Player</h3></p>
		<br />
			<div id="playerDice">
				<div id="diceP1"></div>
				<div id="diceP2"></div>
			</div>

		<p><div id="youRolled">&nbsp;</div></p>
		<div id="score2">Score:</div>
		<div id="scoreBox"><h2>0</h2></div>
	</div>
	<!-- ****** -->
</li>

<li>
<!-------- CONTROL ------->
<div id="diceControl">
<br /><br /><br />
	<div class="diceImage"><div id="diceReplace"></div></div>
	
<div id="resultsDice">
		<div id="resultsd"><br /><br /><br /><br /></div>
		</div>
		
	<p><input type="button" class="btn btn-primary btn-lg active" value="Roll Dice!" onclick="runRandom()"/></p>
	<p><input type="button" class="btn btn-default" value="Bet Money!" onClick="window.location='index.php?page=games&game=rollthedice&dice=rollMoney';"></p>
	
		<input type="button" value="Reset" class="btn btn-default" onClick="document.location.reload(true)">
		

		



</div>
<!-- ***************************************** -->
</li>


<li>
<!-- ************* COMPUTER *************** -->
<div id="wrapperComputer">
	<p><h3>Computer</h3></p>
		<br />
		<div id="computerDice">
			<div id="diceP3"></div>
			<div id="diceP4"></div>
		</div>
	<p><div id="computerRolled">&nbsp;</div></p>
	<div id="score2">Score:</div>
	<div id="scoreBox2"><h2>0</h2></div>
</div>
<!-- close computerDivD -->
</li>

</ul>
</div>
</div>

