<?php

class clsLibGTIN
{
	public static function GTINCheck($p_sGTINCode, $p_bReturnGTIN14 = FALSE, $p_getType = 0)
	{
		//Setting return value
		/*
		 * If TRUE it will retun al barcodes as 14 digit strings
		 * If FALSE it will return only what is needed UPC -> 12 / EAN -> 13 /
		 */
		$bReturnGTIN14 = $p_bReturnGTIN14;

		//Filter UPC coupon codes
		/*
		 * If TRUE it will return false on UPC coupon codes
		 * Type will always return UPC coupon code
		 */
		$bSkipCouponCodes = true;

		//Trims parsed string to remove unwanted whitespace or characters
		$p_sGTINCode = (string)trim($p_sGTINCode);
		if(preg_match('/[^0-9]/', $p_sGTINCode))
			return false;

		if(!is_string($p_sGTINCode)){
			$p_sGTINCode = strval($p_sGTINCode);
		}
		$sGTINCode = trim($p_sGTINCode);
		$p_sGTINCode = null;
		$length = strlen($sGTINCode);
		if(($length > 11 && $length <= 14) || $length == 8){
			$zerros = 18-$length;
			$length = null;
			$fill = "";
			for($i = 0; $i < $zerros; $i++){
				$fill .= "0";
			}
			$zerros = null;
			$i = null;
			$sGTINCode = $fill . $sGTINCode;
			$fill = null;
			if(!clsLibGTIN::GTINCheckDigit($sGTINCode))
	     	{
				return FALSE;
			}elseif(substr($sGTINCode,5,1) > 2){
				//EAN / JAN / EAN-13 code
				if($p_getType){
					return 'EAN';
				}else{
					return (string)substr($sGTINCode,($bReturnGTIN14 ? -14 : -13));
				}
			}elseif(substr($sGTINCode,6,1) == 0 && substr($sGTINCode,0,10) == 0){
				//EAN-8 / GTIN-8 code
				if($p_getType){
					return 'EAN-8';
				}else{
					return (string)substr($sGTINCode,($bReturnGTIN14 ? -14 : -8));
				}
			}elseif(substr($sGTINCode,5,1) <= 0){
				//UPC / UCC-12 GTIN-12 code
				if($p_getType){
				    if(substr($sGTINCode,6,1) == 5)
				        return 'UPC coupon code';
				    else
    					return 'UPC';
				}else{
				    if($bSkipCouponCodes && substr($sGTINCode,6,1) == 5)
				        return false;

					return (string)substr($sGTINCode,($bReturnGTIN14 ? -14 : -12));
				}
			}elseif(substr($sGTINCode,0,6) == 0){
				//GTIN-14
				if($p_getType){
					return 'GTIN-14';
				}else{
					return (string)substr($sGTINCode,-14);
				}
			}else{
				//EAN code
				if($p_getType){
					return 'EAN';
				}else{
					return (string)substr($sGTINCode,($bReturnGTIN14 ? -14 : -13));
				}
			}
		}else{
			return FALSE;
		}
	}

	public static function GTINCheckDigit($p_sGTINCode)
	{
		$iCalculation = 0;
		for($i = 0; $i < (strlen($p_sGTINCode)-1); $i++){
			$iCalculation += $i % 2 ? $p_sGTINCode[$i] * 1 :  $p_sGTINCode[$i] * 3;
		}

		if(substr(10-(substr($iCalculation,-1)), -1) != substr($p_sGTINCode, -1)){
			$iCalculation = null;
			$p_sGTINCode = null;
			return FALSE;
		}else{
			$iCalculation = null;
			$p_sGTINCode = null;
			return TRUE;
		}
	}
}
?>
