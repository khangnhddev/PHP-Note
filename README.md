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
