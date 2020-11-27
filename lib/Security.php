<?php
class Security {
    
    private static $seed = 'PHPADMIN';


	public static function hacher($texte_en_clair) {
		$texte_hache = hash('sha256', self::$seed.$texte_en_clair);
		return $texte_hache;
	}
}
?>