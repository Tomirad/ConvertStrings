<?php
/*
	Interpolacja zmiennych w kodzie źródłowym na zmienne zewnętrzne.
	v.T3.2017.10.17
	- poprawa pattern
	- example brackets: 
		'[]', '[[]]', '{}', '{{}}', '()', '(())', '$$', '$ ', '__', '____'
*/
namespace Treto;

class ConvertStrings {
	public function interpolate($string, $data, $bracket = '[]') {
		if(is_array($data)) {
			$replace = [];
			$b = $this->splitBracket($bracket);
			foreach ($data as $key => $val) {
				if (!is_array($val) && (!is_object($val) || !method_exists($val, '__toString'))) {
					$replace[($b->left.$key.$b->right)] = $val;
				}
			}
			return strtr($string, $replace);
		} else return $string;
	}

	public function findBrackets($string, $bracket = '[]') {
		$b = $this->splitBracket($bracket);
		$pattern = "/[{$b->left}](.*?)[{$b->right}]/";
		preg_match_all($pattern, $string, $matches);
		return $matches[1];
	}

	private function splitBracket($bracket) {
		$b = new \stdClass;
		$strlen = strlen($bracket);
		$b -> left = substr($bracket, 0,$strlen/2);
		$b -> right = substr($bracket, $strlen/2);
		return $b;
	}
}
?>