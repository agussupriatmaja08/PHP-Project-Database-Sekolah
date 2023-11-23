<?php 
function jam(){

	date_default_timezone_set("Asia/Ujung_Pandang");
	date("H");
	if (date("H") < 10){
		return "<h6>Selamat Pagi, De Agus!</h6>" . "<br> <br> <br> <br>" . "<h6>Ayo olahraga</h6>";

	}elseif (date("H") < 15) {
		return "<h6>Selamat Siang, De Agus!</h6>" . "<br> <br> <br> <br>" . "<h6>Ayo Belajar</h6>";
		
	}elseif (date("H") < 19 ) {
		return "<h6>Selamat Sore, De Agus! </h6>" . "<br> <br> <br> <br>" . "<h6>Ayo lari</h6>";
	}
	else{
		return "<h6>Selamat Malam, De Agus!</h6>" . "<br> <br> <br> <br>" . "<h6>Ayo Istirahat</h6>";
	}

}

 ?>

 