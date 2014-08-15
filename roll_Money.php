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
var betsOn = 0;
var x = 0;

function betFive(){
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
	moneyBetPlayer = moneyBetPlayer + 5;
	document.getElementById("amountBet").innerHTML = ("<b>$" + moneyBetPlayer + "</b>");
	betsOn++;
	x = 5;
	computerDec(x);
}


function betTen(){
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
	moneyBetPlayer = moneyBetPlayer + 10;
	document.getElementById("amountBet").innerHTML = ("<b>$" + moneyBetPlayer + "</b>");
	betsOn++;
	x = 10;
	computerDec(x);
}


function betTwenty(){
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
	moneyBetPlayer = moneyBetPlayer + 20;
	document.getElementById("amountBet").innerHTML = ("<b>$" + moneyBetPlayer + "</b>");
	betsOn++;
	x = 20;
	computerDec(x);
}
function cancelBet(){
	document.getElementById("button1").disabled = false;	
	document.getElementById("button2").disabled = false;	
	document.getElementById("button3").disabled = false;
	moneyBetPlayer = 0;
	computerFinal = 0;
	document.getElementById("resultsd").innerHTML = ("<br /><br /><br />");
	document.getElementById("amountBet").innerHTML = ("<b>$0</b>");
	document.getElementById("amountBet2").innerHTML = ("<b>$0</b>");
	computerDec();
}


function computerDec(){

	var computerDeci = (Math.floor(Math.random() * 3)) + 1;

	switch (computerDeci)
	{

	case 1:
	computerFinal = moneyBetPlayer * 2;
	document.getElementById("resultsd").innerHTML = ("<p>The computer wants to match your bet!</p><p><input type='button' value='Roll Dice!' onclick='runRandom()' /></p>" );
	document.getElementById("amountBet2").innerHTML = ("$" + computerFinal); 
	break;
	
	case 2:
	computerFinal = moneyBetPlayer;
	if(betsOn == 1){
		document.getElementById("resultsd").innerHTML = ("<p>The computer doesn't want to bet that amount!</p><p><input type='button' value='Roll Dice Anyway!' onclick='runRandom()' /> <input type='button' value='Cancel Bet!' onClick='cancelBet()'/></p>" );
		betsOn = 0;
	}
	else if (betsOn > 2){
		document.getElementById("resultsd").innerHTML = ("<p>The computer doesn't want to go that high!</p><p><input type='button' value='Roll Dice Anyway!' onclick='lowerBet()' /> <input type='button' value='Cancel Bet!' onClick='cancelBet()'/></p>" );
		betsOn = 0;
	}
	else if (betsOn < 1){
	document.getElementById("resultsd").innerHTML = ("<p>The computer doesn't want to match your bet!</p><p><input type='button' value='Roll Dice Anyway!' onclick='runRandom()' /> <input type='button' value='Cancel Bet' onClick='cancelBet()'/></p>" );
	}
	break;

	case 3:
	computerFinal = moneyBetPlayer * 2;
	document.getElementById("resultsd").innerHTML = ("<p>The computer would like to bet some more!</p><p><input type='button' value='$5' onclick='betFive()' /> <input type='button' value='$10' onclick='betTen()' /><input type='button' value='$20' onclick='betTwenty()'/></p>" );
	document.getElementById("amountBet2").innerHTML = ("$" + moneyBetPlayer);
	document.getElementById("buttonz").disabled = true; 
	break;
	}
}

function lowerBet(){
	if(x == 5){moneyBetPlayer = moneyBetPlayer - 5; runRandom();}	
	else if(x == 10){moneyBetPlayer = moneyBetPlayer - 10; runRandom();}	
	else if(x == 20){moneyBetPlayer = moneyBetPlayer - 20; runRandom();}	
}


function results(){

	document.getElementById("diceP1").innerHTML = ("<img src=rollingdice/" + playerDice1 + ".png />");
	document.getElementById("diceP2").innerHTML = ("<img src=rollingdice/" + playerDice2 + ".png />");
	document.getElementById("diceP3").innerHTML = ("<img src=rollingdice/" + computerDice1 + ".png />");
	document.getElementById("diceP4").innerHTML = ("<img src=rollingdice/" + computerDice2 + ".png />");
	document.getElementById("button1").disabled = false;	
	document.getElementById("button2").disabled = false;	
	document.getElementById("button3").disabled = false;

	document.getElementById("youRolled").innerHTML = ("You rolled a total of " + roundPlayerSum);
	document.getElementById("computerRolled").innerHTML = ("Computer rolled a total of " + roundComputerSum);
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

roundPlayerSum = playerDice1 + playerDice2;
roundComputerSum = computerDice1 + computerDice2;


if (roundPlayerSum != roundComputerSum)
{
	if (roundPlayerSum > roundComputerSum)
	{
		if (playerDice1 == playerDice2)
		{
		
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
				document.getElementById("diceReplace").innerHTML = ("");
				results();
				document.getElementById("resultsd").innerHTML = ("You win this round with a double!");
				playerSum = playerSum + computerFinal;
				document.getElementById("scoreBox").innerHTML = ("<h2>$" + playerSum + "</h2>");
				moneyBetPlayer = 0;
				computerFinal = 0;
				document.getElementById("amountBet").innerHTML = ("<b>$0</b>");
				document.getElementById("amountBet2").innerHTML = ("<b>$0</b>");


		
		},5000);	
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
		}

		else

		{
	
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
				document.getElementById("diceReplace").innerHTML = ("");
				results();
				document.getElementById("resultsd").innerHTML = ("You win this round!");
				playerSum = playerSum + computerFinal;
				document.getElementById("scoreBox").innerHTML = ("<h2>$" + playerSum + "</h2>");
				moneyBetPlayer = 0;
				computerFinal = 0;
				document.getElementById("amountBet").innerHTML = ("<b>$0</b>");
				document.getElementById("amountBet2").innerHTML = ("<b>$0</b>");

		
		},5000);	
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
		}

	} else {

	if (roundComputerSum > roundPlayerSum) 
	{
		if (computerDice1 == computerDice2)
		{	
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
				document.getElementById("diceReplace").innerHTML = ("");
				results();
				document.getElementById("resultsd").innerHTML = ("Computer wins this round with a double!");
				computerSum = computerSum + computerFinal;
				document.getElementById("scoreBox2").innerHTML = ("<h2>$" + computerSum + "</h2>");
				moneyBetPlayer = 0;
				computerFinal = 0;
				document.getElementById("amountBet").innerHTML = ("<b>$0</b>");
				document.getElementById("amountBet2").innerHTML = ("<b>$0</b>");
				document.getElementById("resultsd").innerHTML = ("<p>The computer wants to match your bet!</p><p><input type='button' value='Roll Dice!' onclick='runRandom()' /></p>" );

		
		},5000);		
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	
		}

		else

		{
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
				document.getElementById("diceReplace").innerHTML = ("");
				results();
				document.getElementById("resultsd").innerHTML = ("Computer wins this round!");
				computerSum = computerSum + computerFinal;
				document.getElementById("scoreBox2").innerHTML = ("<h2>$" + computerSum + "</h2>");
				moneyBetPlayer = 0;
				computerFinal = 0;
				document.getElementById("amountBet").innerHTML = ("<b>$0</b>");
				document.getElementById("amountBet2").innerHTML = ("<b>$0</b>");


		},5000);	
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	

		}
	}}	
}

else{

	if (roundPlayerSum == roundComputerSum)
	{
		document.getElementById("diceReplace").innerHTML = ("<img src='images/dice_back.gif'></img>");
		document.getElementById("resultsd").innerHTML = ("<br /><p>rolling dice...</p><br />");
		setTimeout(function(){
				document.getElementById("diceReplace").innerHTML = ("");
				results();
				document.getElementById("resultsd").innerHTML = ("This game is a tie so nobody wins!");
				document.getElementById("scoreBox2").innerHTML = (" ");
				moneyBetPlayer = 0;
				computerFinal = 0;
				document.getElementById("amountBet").innerHTML = ("<h2<b>$0</b></h2>");
				document.getElementById("amountBet2").innerHTML = ("<h2<b>$0</b></h2>");


		},5000);	
	document.getElementById("button1").disabled = true;	
	document.getElementById("button2").disabled = true;	
	document.getElementById("button3").disabled = true;	


	}
}


//close of function runRandom()
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
		<div id="score2">Money:</div>
		<div id="scoreBox"><h2>0</h2></div>
	</div>
	<!-- ****** -->
</li>

<li>
<!-------- CONTROL ------->
<div id="diceControl">
<br /><br />
	<div class="diceImage"><div id="diceReplace"></div></div>
	
<div id="resultsDice">
		<div id="resultsd"><br /><br /><br /><br /></div>
		</div>
		

<div id="betWindow">
<p><b>How much money would you like to bet?</b></p>
<input type="button" id="button1" class="btn btn-default" value="$5" onclick="betFive()" />	
<input type="button" id="button2" class="btn btn-default" value="$10" onclick="betTen()" />
<input type="button" id="button3" class="btn btn-default" value="$20" onclick="betTwenty()" />
<br /><br />
<p>Amount betting at the moment: </p>
<p><div id="amountBet"><b>$0</b></div></p>
</div>		

		
	<p><input type="button" class="btn btn-default" value="No Money!" onClick="window.location='index.php?page=games&game=rollthedice&roll=roll';">
	   <input type="button" value="Reset" class="btn btn-default" onClick="document.location.reload(true)"></p>
		


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
	<div id="score2">Money:</div>
	<div id="scoreBox2"><h2>0</h2></div>
</div>
<!-- close computerDivD -->
</li>

</ul>
</div>
</div>

