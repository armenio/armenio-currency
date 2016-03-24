<?php
namespace Armenio\Currency;

use Locale;
use NumberFormatter;

use Zend\Stdlib\ErrorHandler;

/**
 * Currency
 * 
 * @author Rafael Armenio <rafael.armenio@gmail.com>
 * @version 1.0
 */
class Currency
{	
	/**
	 * symbol
	 * 
	 * @author Rafael Armenio <rafael.armenio@gmail.com>
	 * @version 1.0 
	 * @return void
	 */
	public static function symbol($locale = null)
	{
		if( ! $locale ){
			$locale = Locale::getDefault();
		}

		$formatter = new NumberFormatter(
			$locale,
			NumberFormatter::CURRENCY
		);

		$currency = $formatter->format(0);

		$symbol = trim(preg_replace('/[0-9.,]/i', '', $currency));

		return $symbol;
	}
	
	/**
	 * format
	 * 
	 * @author Rafael Armenio <rafael.armenio@gmail.com>
	 * @version 1.0 
	 * @return void
	 */
	public static function format($number, $locale = null, $currencyCode = null)
	{
		$number = self::normalize($number, $locale);
		
		if( ! $locale ){
			$locale = Locale::getDefault();
		}

		$formatter = new NumberFormatter(
			$locale,
			NumberFormatter::DECIMAL
		);

		$formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
		
		ErrorHandler::start();
		if( ! $currencyCode ){
			$currency = $formatter->format($number);
		}else{
			$currency = $formatter->formatCurrency(
				$number, $currencyCode
			);
		}
		ErrorHandler::stop();
		
		if (false !== $currency) {
			return $currency;
		}

		return $number;
	}
	
	/**
	 * normalize
	 * 
	 * @author Rafael Armenio <rafael.armenio@gmail.com>
	 * @version 1.0 
	 * @return void
	 */
	public static function normalize($number, $locale = null)
	{
		if( $number === (float) $number){
			return $number;
		}
		
		if( ! $locale ){
			$locale = Locale::getDefault();
		}

		$formatter = new NumberFormatter(
			$locale,
			NumberFormatter::DECIMAL
		);

		$formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);

		ErrorHandler::start();
		$decimal = $formatter->parse($number);
		ErrorHandler::stop();

		if (false !== $decimal) {
			return $decimal;
		}

		return $number;
	}

	/**
	 * discount
	 * 
	 * @author Rafael Armenio <rafael.armenio@gmail.com>
	 * @version 1.0 
	 * @return void
	 */
	public static function discount($value, $percentDiscount){
		return $value-($value*($percentDiscount/100));
	}

	/**
	 * getNumberOfInstallments
	 * 
	 * @author Rafael Armenio <rafael.armenio@gmail.com>
	 * @version 1.0 
	 * @return void
	 */
	public static function getNumberOfInstallments($total, $minValue, $maxInstallments){
		$numberOfInstallments = (int) ( $total/$minValue );

		if( $numberOfInstallments == 0 ){
			$numberOfInstallments = 1;
		}elseif( $numberOfInstallments > $maxInstallments){
			$numberOfInstallments = $maxInstallments;
		}

		return $numberOfInstallments;
	}
}
?>