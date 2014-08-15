<?php 
	
if(isset($_GET['dice'])){
	switch ($_GET['dice']){
		case 'rollMoney':
		include 'roll_Money.php';
		break;
		
		case 'roll':
		include 'roll_noMoney.php';
		break;
		
		default:
		include 'roll_noMoney.php';
		break;
	}
}else{
	include 'roll_noMoney.php';

}

?>