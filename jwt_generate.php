<?php
	http_response_code(400);

	$base64Encode=base64urlEncode("Khang Khang");
	
	echo $base64Encode;
	
	function base64urlEncode(string $text): string
	{
		return str_replace(
			["+", "/", "="],
			["-", "_", ""],
			base64_encode($text)
		);
	}
?>