# This is simple note
### Closure
### Generator
### Iterator
### Trait
### Null Coalescing 
```php
<?php
function getData(){
  return "";
}
$result = getData() ?: 'Not Have Data';
echo $result;
```

### Magic Invoke
```php
<?php
class MyClosure {
    public function __invoke($x) {
        return $x;
    }
}
$myVar = new MyClosure();
var_dump($myVar(35));
```

### Builder Pattern
```php
<?php

class Car{
  private $engine;
  private $chassis;
  private $body;
  
  public function __construct($engine, $chassis, $body){
    $this->engine= $engine;
    $this->chassis= $chassis;
    $this->body= $body;
  }
}

class CarBuilder{
  private $engine;
  private $chassis;
  private $body;

  public function addEngine($engine){
      $this->engine=$engine;
      
      return $this;
  }

  public function addChassis($chassis){
     $this->chassis= $chassis;
     
     return $this;
  }

  public function addBody($body){
      $this->body= $body;
      
      return $this;
  }
  public function build(){
    return new Car($this->engine, $this->chassis, $this->body);
  }
}

$car1 = (new CarBuilder())
        ->addEngine('Khang addEngine 1')
        ->addChassis('Khang addChassis 1')
        ->addBody('Khang addBody 1')
        ->build();

$car2 = (new CarBuilder())
        ->addEngine('Khang addEngine 2')
        ->build();

var_dump($car2);

```
### PDO
### CSRF Token
CSRF stands for cross-site request forgery. It’s a kind of attack in which a hacker forces you to execute an action against a website where you’re currently logged in.

For example, you visit the malicious-site.com that has a hidden form. And that form submits on page load to yourbank.com/transfer-fund form.

Because you’re currently logged in to the yourbank.com, the request silently transfers a fund out of your bank account.

If yourbank.com/transfer-fund implements the CSRF correctly, it generates a one-time token and inserts the token into the fund transfer form like this

### Sanitize Input

### Flash Messages
A flash message allows you to create a message on one page and display it once on another page. To transfer a message from one page to another, you use the $_SESSION superglobal variable.

### Exception

### Static methods and properties
Suppose that you want to create an App class for your web application. And the App class should have one and only one instance during the lifecycle of the application. In other words, the App should be a singleton.
The following illustrates how to define the App class by using the static methods and properties:

```php
<?php

class App
{
	private static $app = null;

	private function __construct()
	{
	}

	public static function get() : App
	{
		if (!self::$app) {
			self::$app = new App();
		}

		return self::$app;
	}

	public function bootstrap(): void
	{
		echo 'App is bootstrapping...';
	}
}
```

### What is the use of the isset() function in PHP?
The isset() function in PHP is used to determine if a variable is set and is not NULL. It returns TRUE if the variable exists and has a value other than NULL, otherwise it returns FALSE.

```php
$var = "Hello, World!";
if (isset($var)) {
    echo "Variable is set.";
} else {
    echo "Variable is not set.";
}
```

