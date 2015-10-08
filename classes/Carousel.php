<?php

require_once 'Abrenet.php';

class Carousel
{
	private $cx;
	
	public function __construct()
	{
		$this->cx = new Abrenet();
	}
	
	public function getCarousel(){
		$content = '';

		$sql = "SELECT *
		FROM
			cp_carrousel
		ORDER BY cr_id ASC
		;";

		if (($rs = $this->cx->query($sql, MYSQLI_STORE_RESULT)) !== false) {
			if ($rs->num_rows > 0) {
				$carousels = $rs->fetch_all(MYSQLI_ASSOC);

				ob_start();
				require __DIR__ . '/../views/carousels.php';
				$content = ob_get_clean();
			}
		}

		return $content;
	}
}
?>