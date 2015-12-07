<?php
class CalcularImc{
	public $result;
	
	public function calcular($peso, $altura){
		
		$result = ($peso/($altura*$altura));
		$result = number_format($result, 2, '.', '');
		
		switch ($result) {
			case $result<20:
				echo "O IMC e $result, ABAIXO DO PESO.";
			break;
			case ($result>20 && $result<24.9):
				echo "O IMC e $result, PESO NORMAL.";
			break;
			case ($result>25 && $result<29.9):
				echo "O IMC e $result, SOBREPESO.";
			break;
			case ($result>30 && $result<39.9):
				echo "O IMC e $result, OBESO.";
			break;
			case $result>40:
				echo "O IMC e $result, OBESO MÓRBIDO.";
			break;
			default:
				echo "Verifique os valores inseridos e tente de novo.";
			break;
		}
		echo '<a href="index.php">Voltar</a>';
	}
}