<?php

	function parseInput()
	{
		$data = file_get_contents("php://input");

		if($data == false)
			return null;

		return json_decode($data);
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$data = parseInput();

		echo "fullname: {$data->fullname}\n
        sr-code: {$data->srcode}\n
        type: {$data->type}\n";
	}
	else
	{
		echo "Unsupported request method.";
	}
?>
