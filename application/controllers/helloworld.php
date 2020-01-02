<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Helloworld extends CI_Controller
{
	
	public function index()
	{
		$input = 3;
		for ($i=0; $i <=$input; $i++) { 
			for ($j=0; $j <=$i ; $j++) { 
				echo $i;
			}
			echo "<br>";
		}

		$input3=5;
		for ($k=$input;$k>=0;$k--) { 
			for ($b=0; $b<=$k; $b++) { 
				echo $b;
			}
			echo "<br>";
		}
	}

	public function segitiga()
	{
		$input=5;
		for($i=0;$i<$input;$i++) 
		{
			for($j=1;$j<=$input;$j++) 
			{ 
		      echo "&nbsp";
			}
			for ($k=1;$k<2*$i;$k++) { 
				echo "*";
			}
		  echo "<br>";
		}
		for ($a=$input; $a>=1 ; $a--) { 
			for ($b=1; $b<=$a ; $b++) { 
				echo "&nbsp";
			}
			for ($q=$a;$q<=$input ; $q++) { 
				echo $q;
			}
			echo "<br>";
		}
		for ($a=1; $a<=$input ; $a++) { 
			for ($b=$input; $b>=$a; $b--) { 
				echo "&nbsp";
			}
			for ($q=1;$q<=$a ; $q++) { 
				echo $q;
			}
			echo "<br>";
		}
		$bil=5;
		for($i=1;$i<=$bil;$i++){
		for($j=$i;$j<=$bil;$j++){
			if($j%2===0){
				?>
				<u><?php echo $j ?></u>
				<?php
			}
			else{
			echo $j;}
		}
		echo "<br>";
	}
	}

	public function angka($angka=140145)
	{
		$baris=0;
		$jumlahAngka=strlen($angka);
		$pisahAngka=str_split($angka);
		for ($baris=0; $baris <$jumlahAngka ; $baris++) { 
			echo $pisahAngka[0+$baris];
			for ($i=$jumlahAngka-1; $i>$baris; $i--) { 
				echo "0";
			}
			echo "<br>";
		}
	}
	public function prima()
	{
		$mulai=1;
		$batas=9;
		if ($batas>=2) {
			for ($i=$mulai; $i <=$batas ; $i++) { 
				$batasbagi=0;
				for ($j=1;$j<=$i; $j++) { 
				if ($i % $j === 0) {
					$batasbagi+=1;
					//echo $i."-".$batasbagi.",";
				 }

				}
				if ($batasbagi === 2) {
					echo $i.",";
				}
				//echo $batasbagi.",";
					// 	if ($j%2==0) {
					// 	echo "<u>$j</u>";
					// }
					// else{
					// 	echo $j;
					// }
			}
		}
		else{
			echo "maaf angka harus lebih dari 2";
		}
	}
}
 ?>