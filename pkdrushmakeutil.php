#!php
<?php

class Makefile {

	var $lines;

	public function indexOf($text) {
		foreach ($this->lines as $key => $line) {
			if (trim($line) === $text) {
				return $key;
			}
		}
		throw new RuntimeException("Text not found: $text");
	}

	public function __construct($fileName) {
		$this->lines = file($fileName);
	}
}

class PKDrushMakeUtil {

	function __construct($args) {
		$i = 1;
		@$command = $args[$i++];
		if ($command == "modules") {
			$this->modules($args[$i++]);
		} else {
			$this->help();
		}
	}

	function help() {
		print "Quick help: Command line arguments: command argument1 argument2 ...\n";
	}

	function modules($fileName) {
		$makefile = new Makefile($fileName);
		$listBegin = $makefile->indexOf(";!begin:modules");
		$listEnd = $makefile->indexOf(";!end:modules");
	}

}

$makeUtil = new PKDrushMakeUtil($argv);
