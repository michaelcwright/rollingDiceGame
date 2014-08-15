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
var moneyBetPlayer = 0;
var computerFinal = 0;
var computerDeci = 0;

function betFive(){
	
	moneyBetPlayer = moneyBetPlayer + 5;
	document.getElementById("amountBet").innerHTML = ("$" + moneyBetPlayer);
	computerDec();
}


function betTen(){
	
	moneyBetPlayer = moneyBetPlayer + 10;
	document.getElementById("amountBet").innerHTML = ("$" + moneyBetPlayer);
	computerDec();
}


function betTwenty(){
	
	moneyBetPlayer = moneyBetPlayer + 20;
	document.getElementById("amountBet").innerHTML = ("$" + moneyBetPlayer);
	computerDec();
}
function cancelBet(){
	window.location = 'wagers.html';


}


function computerDec(){

	var computerDeci = (Math.floor(Math.random() * 3)) + 1;


	switch (computerDeci)
	{

	case 1:
	computerFinal = moneyBetPlayer * 2;
	document.getElementById("resultsd").innerHTML = ("The computer wants to match your bet! <br /> <input type='button' value='Roll Dice!' onclick='runRandom()' />" );
	document.getElementById("amountBet2").innerHTML = ("$" + moneyBetPlayer);
	break;
	
	case 2:
	computerFinal = moneyBetPlayer;
	document.getElementById("resultsd").innerHTML = ("The computer doesn't want to match your bet!<br /> <input type='button' value='Roll Dice Anyway!' onclick='runRandom()' /> <input type='button' value='Cancel Bet!' onclick='cancelBet()' />" );
	break;

	case 3:
	computerFinal = moneyBetPlayer * 2;
	document.getElementById("amountBet2").innerHTML = ("$" + moneyBetPlayer);
	document.getElementById("resultsd").innerHTML = ("The computer would like to bet some more!<br /> <input type='button' value='$5' onclick='betFive()' /> <input type='button' value='$10' onclick='betTen()' /><input type='button' value='$20' onclick='betTwenty()' />" );
	break;
	}

//close funtion computerDec
}


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

document.getElementById("diceP1").innerHTML = ("<img src=includes/games/rollingdice/" + playerDice1 + ".png />");
document.getElementById("diceP2").innerHTML = ("<img src=includes/games/rollingdice/" + playerDice2 + ".png />");
document.getElementById("diceP3").innerHTML = ("<img src=includes/games/rollingdice/" + computerDice1 + ".png />");
document.getElementById("diceP4").innerHTML = ("<img src=includes/games/rollingdice/" + computerDice2 + ".png />");





roundPlayerSum = playerDice1 + playerDice2;
roundComputerSum = computerDice1 + computerDice2;
document.getElementById("youRolled").innerHTML = ("You rolled a total of " + roundPlayerSum);
document.getElementById("computerRolled").innerHTML = ("Computer rolled a total of " + roundComputerSum);





if (roundPlayerSum != roundComputerSum)
{
	if (roundPlayerSum > roundComputerSum)
	{
		if (playerDice1 == playerDice2)
		{
	
		document.getElementById("resultsd").innerHTML = ("You win this round with a double!");
		playerSum = playerSum + computerFinal;
		document.getElementById("scoreBox").innerHTML = ("$" + playerSum);
		moneyBetPlayer = 0;
		computerFinal = 0;
		document.getElementById("amountBet").innerHTML = (" ");
		document.getElementById("amountBet2").innerHTML = (" ");
		}

		else

		{
	
		document.getElementById("resultsd").innerHTML = ("You win this round!");
		playerSum = playerSum + computerFinal;
		document.getElementById("scoreBox").innerHTML = ("$" + playerSum);
		moneyBetPlayer = 0;
		computerFinal = 0;
		document.getElementById("amountBet").innerHTML = (" ");
		document.getElementById("amountBet2").innerHTML = (" ");

		}

	} else {

	if (roundComputerSum > roundPlayerSum) 
	{
		if (computerDice1 == computerDice2)
		{
		
		document.getElementById("resultsd").innerHTML = ("Computer wins this round with a double!");
		computerSum = computerSum + computerFinal;
		document.getElementById("scoreBox2").innerHTML = ("$" + computerSum);
		moneyBetPlayer = 0;
		computerFinal = 0;
		document.getElementById("amountBet").innerHTML = (" ");
		document.getElementById("amountBet2").innerHTML = (" ");
		}

		else

		{
	
		document.getElementById("resultsd").innerHTML = ("Computer wins this round!");
		computerSum = computerSum + computerFinal;
		document.getElementById("scoreBox2").innerHTML = ("$" + computerSum);
		moneyBetPlayer = 0;
		computerFinal = 0;
		document.getElementById("amountBet").innerHTML = (" ");
		document.getElementById("amountBet2").innerHTML = (" ");

		}
	}}	
}

else{

	if (roundPlayerSum == roundComputerSum)
	{

	document.getElementById("resultsd").innerHTML = ("This game is a tie so nobody wins!");

	}
}


//close of function runRandom()
}



</script>

<div id="wrapper">
<div id="gregstalesV">

<h1>Rolling Dice - Wagers</h1>


<div id="rollDiceBack">
<div id="divStoryTitleVadoma">
Do you think you are good at rolling the dice? How about we bet some money this time? Show us what you got!
</div><!-- close divStoryTitle -->



<div id="rollDiceInfo">


<div id="resultsDice">
<div id="resultsd"></div>
</div><!-- close results -->






<div id="wrapperPlayer">

<div id="betWindow">
<p>Bet Window</p>
<p>How much money would you like to bet?</p>
<input type="button" value="$5" onclick="betFive()" />	
<input type="button" value="$10" onclick="betTen()" />
<input type="button" value="$20" onclick="betTwenty()" />
<p>Amount betting at the moment: </p>
<p><div id="amountBet"></div>
</div>

<div id="playerDivD">
<p>Player</p>

<div id="playerDice">
<div id="diceP1"></div><div id="diceP2"></div>
</div><!-- close playerDice -->

<div id="youRolled"></div><!-- close youRolled -->
<div id="diceButton">



<input type="button" value="Reset Game" onClick="document.location.reload(true)">
<input type="button" value="Go back!" onClick="window.location = 'beTheRoll.html';">
</div><!-- close diceButton -->


<div id="score2">Money:</div><div id="scoreBox"></div>


</div><!-- close playerDivD -->
</div><!-- close wrapperPlayer -->







<div id="wrapperComputer">

<div id="betWindow2">
<br /><br /><br />
<br /><br /><br /><br /><br /><br />
<p>Amount betting at the moment: </p>
<p><div id="amountBet2"></div>
</div>

<div id="computerDivD">
<p>Computer</p>


<div id="computerDice">

<div id="diceP3"></div><div id="diceP4"></div></div>

<div id="computerRolled"></div>


<div id="score1">Money:</div><div id="scoreBox2"></div>

</div><!-- close computerDivD -->



</div><!-- close wrapperPlayer -->



</div><!-- close rollDiceInfo -->



</div><!-- close rollDiceBack -->



</div><!-- close gregstales -->
</div><!-- close wrapper -->

