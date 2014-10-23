<?php
class TypeException extends Exception {

	const ERR_VIDE ="Le paramètre ne doit pas être une chaîne vide.";
	const ERR_STRING ="Le paramètre doit être une chaîne de caractères.";
	const ERR_INTEGER ="Le paramètre doit être une valeur entière.";
	const ERR_NUMERIC ="Le paramètre doit être une valeur numérique.";
	const ERR_FOLDER="Le paramètre doit être un dossier";
	const ERR_RESOURCE="Le paramètre doit être une ressource";
	const ERR_OBJET = "Erreur - le paramètre doit être un objet";
	const ERR_MEDIA = "Erreur - le paramètre doit être un objet de type Media";
	const ERR_ARRAY = "Erreur - le paramètre doit être un array";

	/**
	 * détermine si le paramètre est une chaîne vide
	 * @param mixed $sCh
	 */
	public static function estVide($sCh){
		if( $sCh === "")
			throw new TypeException(TypeException::ERR_VIDE);
	}

	/**
	 * détermine si le paramètre est une chaîne de caractères
	 * @param mixed $sCh
	 */
	public static function estString($sCh){
		if(is_numeric($sCh)==true)
			throw new TypeException(TypeException::ERR_STRING." - ".$sCh);
	}
	/**
	 * détermine si le paramètre est une valeur numérique
	 * @param mixed $iInt
	 */
	public static function estNumerique($iInt){
		if(is_numeric($iInt)==false)
			throw new TypeException(TypeException::ERR_NUMERIC);
	}
	/**
	 * détermine si le paramètre est une valeur entière
	 * @param mixed $iInt
	 */
	public static function estInteger($iInt){
		if(is_integer($iInt)==false)
			throw new TypeException(TypeException::ERR_INTEGER);
	}
	/**
	 * détermine si le paramètre est un dossier
	 * @param mixed $sDossier
	 */
	public static function estDossier($sDossier){
		if(is_dir($sDossier)==false)
			throw new TypeException(TypeException::ERR_FOLDER);
	}

	/**
	 * détermine si le paramètre est un objet de type Media
	 * @param Media $oMedia
	 */
	public static function estMedia(Object $oMedia){
		if(gettype($oMedia) !== 'Media')
			throw new TypeException(TypeException::ERR_MEDIA);

	}

	/**
	 * détermine si le paramètre est une ressource
	 * @param mixed $rH
	 */
	public static function estResource($rH){
		if(is_resource($rH)==false)
			throw new TypeException(TypeException::ERR_RESOURCE);
	}
	/**
	 * détermine si le paramètre est un objet
	 * @param mixed $oObj
	 */
	public static function estObjet($oObj){
		if(is_object($oObj) == false){
			throw new Exception(TypeException::ERR_OBJET);
		}
	}

	/**
	 * détermine si le paramètre est un array
	 * @param mixed $aArr
	 */
	public static function estArray($aArr){
		if(is_array($aArr) == false){
			throw new Exception(TypeException::ERR_ARRAY);
		}
	}

	public function __construct($sMsg="", $iCode=0){
		parent::__construct($sMsg, $iCode);
	}

}