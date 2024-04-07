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
