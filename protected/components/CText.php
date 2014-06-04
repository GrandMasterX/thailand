<?php

class CText extends CComponent
{
    public static function ellipsis($text, $limit = 160)
    {
        $text = strip_tags($text);

        if(mb_strlen($text, 'UTF-8') > $limit) {
            $pos = mb_strpos($text, ' ', $limit, 'UTF-8');
            $text = mb_substr($text, 0, $pos, 'UTF-8');
            $text .= '...';
        }

        return $text;
    }

    public static function number($number)
    {
        return number_format($number, 2, '.', ' ');
    }
	
	public static function num2str($num) {
		$nul='ноль';
		$ten=array(
			array('','один', 'два', 'три', 'чотири', 'п`ять', 'шість', 'сім', 'вісім', 'дев`ять'),
			array('','одна', 'дві', 'три', 'чотири', 'п`ять', 'шість', 'сім', 'вісім', 'дев`ять'),
		);
		$a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
		$tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' , 'вісімдесят', 'дев`яносто');
		$hundred=array('','сто', 'двісті', 'триста', 'чотириста', 'п`ятсот', 'шістсот', 'сімсот', 'вісімсот', 'дев`ятсот');
		$unit=array( // Units
			array('копійка', 'копійки', 'копійок',	 1),
			array('гривня'   ,'гривні'   ,'гривень'    ,0),
			array('тисячі', 'тисячі', 'тисяч'     ,1),
			array('мільйон', 'мільйона', 'мільйонів' ,0),
			array('мільярд', 'міліарда', 'мільярдів',0),
		);
		//
		list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
		$out = array();
		if (intval($rub)>0) {
			foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
				if (!intval($v)) continue;
				$uk = sizeof($unit)-$uk-1; // unit key
				$gender = $unit[$uk][3];
				list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
				// mega-logic
				$out[] = $hundred[$i1]; # 1xx-9xx
				if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
				else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
				// units without rub & kop
				if ($uk>1) $out[]= self::morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
			} //foreach
		}
		else $out[] = $nul;
		$out[] = self::morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
		$out[] = $kop.' '.self::morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
		return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
	}

	private static function morph($n, $f1, $f2, $f5) {
		$n = abs(intval($n)) % 100;
		if ($n>10 && $n<20) return $f5;
		$n = $n % 10;
		if ($n>1 && $n<5) return $f2;
		if ($n==1) return $f1;
		return $f5;
	}	

}