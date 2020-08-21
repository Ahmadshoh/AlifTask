<?php

$file = $argv[1];
$operation = $argv[2];


file_put_contents("positive.txt", "");
file_put_contents("negative.txt", "");


if (file_exists($file)) {
	$data = file_get_contents($file);

	$values = explode("\n", $data);

	foreach ($values as $value) {
		if (!empty($value)) {
			$value1 = explode(" ", $value)[0];
			$value2 = explode(" ", $value)[1];

			switch ($operation) {
				case '*':
					$result = $value1 * $value2;
					break;
				case '/':
					$result = $value1 / $value2;
					break;
				case '+':
					$result = $value1 + $value2;
					break;
				case '-':
					$result = $value1 - $value2;
					break;
				default:
					echo "Ошибка. Программа может работать только с текущими операциями: ('*') - умножение, (/) - деление, (+) - сложение, (-) - вычитание \n";
					break;
			}

			if (isset($result)) {
				if ($result >= 0) {
					file_put_contents("positive.txt", $result . "\n", FILE_APPEND);
				} else {
					file_put_contents("negative.txt", $result . "\n", FILE_APPEND);
				}
			}			
		}
	}
} else {
	echo "Не существует файл с именем " . $file . ". Сначало создайте файл и повторите попытку.\n";
}
