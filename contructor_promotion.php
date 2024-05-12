<?php
	class User
	{
		public function __construct(
			public string $name,
			public int $age,
			public string $username,
			public ?string $email = null
		) {}
	}
	
	// Usage
	$user = new User('John Doe', 30,"khangnhdngankdt", 'john@example.com');
	
	echo $user->name;   // Output: John Doe
	echo $user->age;    // Output: 30
	echo $user->email;  // Output: john@example.com
	echo $user->username;
?>