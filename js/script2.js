$(document).ready(function(){
		

		//real time halaman dashboard.php
				setInterval(function() {
            		$('.data').load('index.php');
          							}, 100);

	

  });