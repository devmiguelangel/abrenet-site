<?php

require 'Abrenet.php';


class Slider
{
	private $cx;

    private $lang;


	public function __construct($lang)
    {
		$this->cx   = new Abrenet();
        $this->lang = strtoupper($lang);
	}
	
	public function getSlider()
    {
        $content = '';

        $sql = "SELECT *
        FROM
          cp_slider
        ORDER BY sl_orden ASC
        ;";

        if (($rs = $this->cx->query($sql, MYSQLI_STORE_RESULT)) !== false) {
            if ($rs->num_rows > 0) {
                $sliders = $rs->fetch_all(MYSQLI_ASSOC);

                $sql = "SELECT *
                FROM
                  cp_textbanner
                WHERE tx_idioma = '" . $this->lang . "'
                ORDER BY tx_id ASC
                ;";

                if (($rs = $this->cx->query($sql, MYSQLI_STORE_RESULT)) !== false) {
                    if ($rs->num_rows > 0) {
                        $texts = $rs->fetch_all(MYSQLI_ASSOC);

                        ob_start();
                        require __DIR__ . '/../views/sliders.php';
                        $content = ob_get_clean();
                    }
                }
            }
        }

        return $content;
	}
}


?>