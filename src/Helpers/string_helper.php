<?php

if (! function_exists('parse_decimal')) {
	/**
	 * Format a decimal string from (#.###.###,##) -> (#######.##)
	 * 
	 * @param string $string
	 * @param bool $truncate
	 */
	function parse_decimal(string $string, bool $truncate = false) : float {
		$string = str_replace('.', '', $string);
		$string = str_replace(',', '.', $string);

		$float = (float) $string;

		if ($truncate === true) {
			$float = number_format($float, cons('numeric_precision', 2), '.', '');
		}

		return $float;
	}
}

if (! function_exists('add_thousands_separator')) {
	function add_thousands_separator($string, int $precision = null) {
		$number = (float) $string;
		$number = number_format($number, $precision ?? cons('numeric_precision', 2), ',', '.');

		return $number;
	}
}

if (! function_exists('remove_thousands_separator')) {
	/**
	 * Removes thousand separators from string.
	 * 
	 * @param string $string
	 * @param string $separator
	 * @param string $replace
	 * 
	 * @return string
	 */
	function remove_thousands_separator($string, $separator = '.', $replace = '') : string {
		$string = str_replace($separator, $replace, $string);

		return $string;
	}
}


if (! function_exists('format_amount')) {
	function format_amount($amount) : string {
		return 'Gs. ' . add_thousands_separator($amount);
	}
}