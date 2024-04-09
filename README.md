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
