
# PHP Notes

## Topics Covered:
1. Closure
2. Generator
3. Iterator
4. Trait
5. Null Coalescing
6. Magic Invoke
7. Builder Pattern
8. PDO
9. CSRF Token
10. Sanitize Input
11. Flash Messages
12. Exception
13. Static Methods and Properties
14. isset() Function
15. Dependency Injection
16. Singleton Design Pattern
17. Factory Design Pattern
18. PHP 8 Features
19. Autoloading with Composer
20. Regular Expressions
21. Sessions in PHP
22. File Handling in PHP
23. Streams in PHP
24. PHP Error Handling
25. Reflection API

---
### **1. Closure**
Closures are anonymous functions often used for callbacks or encapsulating logic.

#### Example:
```php
$greet = function ($name) {
    return "Hello, $name!";
};

echo $greet('John'); // Outputs: Hello, John!
```

---

### **2. Generator**
Generators allow you to yield values one at a time, simplifying iteration.

#### Example:
```php
function numbers() {
    for ($i = 1; $i <= 3; $i++) {
        yield $i;
    }
}

foreach (numbers() as $number) {
    echo $number; // Outputs: 1 2 3
}
```

---

### **3. Iterator**
Iterators allow traversal of data structures in a sequential manner.

#### Example:
```php
class MyIterator implements Iterator {
    private $items = ['one', 'two', 'three'];
    private $position = 0;

    public function current() {
        return $this->items[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        $this->position++;
    }

    public function rewind() {
        $this->position = 0;
    }

    public function valid() {
        return isset($this->items[$this->position]);
    }
}

$iterator = new MyIterator();
foreach ($iterator as $key => $value) {
    echo "$key => $value
";
}
```

---

### **4. Trait**
Traits enable code reuse across multiple classes.

#### Example:
```php
trait Logger {
    public function log($message) {
        echo $message;
    }
}

class User {
    use Logger;
}

$user = new User();
$user->log("This is a log message."); // Outputs: This is a log message.
```

---

### **5. Null Coalescing**
The `??` operator checks if a value is null and provides a fallback.

#### Example:
```php
$name = $_GET['name'] ?? 'Guest';
echo $name; // Outputs: Guest if $_GET['name'] is not set.
```

---

### **6. Magic Invoke**
The `__invoke` method makes objects callable.

#### Example:
```php
class CallableClass {
    public function __invoke($value) {
        return $value * 2;
    }
}

$obj = new CallableClass();
echo $obj(5); // Outputs: 10
```

---

### **7. Builder Pattern**
A creational design pattern for step-by-step object construction.

#### Example:
```php
class CarBuilder {
    private $engine;
    private $chassis;
    private $body;

    public function setEngine($engine) {
        $this->engine = $engine;
        return $this;
    }

    public function setChassis($chassis) {
        $this->chassis = $chassis;
        return $this;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

    public function build() {
        return new Car($this->engine, $this->chassis, $this->body);
    }
}

$car = (new CarBuilder())
    ->setEngine("V8")
    ->setChassis("Steel")
    ->setBody("Sedan")
    ->build();
```

---

### **8. PDO**
PHP Data Objects (PDO) provides a unified API for database interactions.

#### Example:
```php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $stmt = $pdo->query('SELECT * FROM users');

    foreach ($stmt as $row) {
        echo $row['name'] . "
";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
```

---

### **9. CSRF Token**
Tokens prevent cross-site request forgery by ensuring requests are genuine.

#### Example:
```php
session_start();
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token");
}
```

---

### **10. Sanitize Input**
Sanitizing input prevents XSS and other attacks.

#### Example:
```php
$input = '<script>alert("XSS");</script>';
$safeInput = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

echo $safeInput; // Outputs: &lt;script&gt;alert(&quot;XSS&quot;);&lt;/script&gt;
```

---

### **11. Flash Messages**
Flash messages persist data for a single request using sessions.

#### Example:
```php
session_start();
$_SESSION['flash_message'] = 'Your changes have been saved.';

if (isset($_SESSION['flash_message'])) {
    echo $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}
```

---

### **12. Exception Handling**
PHP exceptions handle errors gracefully.

#### Example:
```php
try {
    $number = 5 / 0;
} catch (DivisionByZeroError $e) {
    echo "Error: Cannot divide by zero.";
} finally {
    echo "Cleanup complete.";
}
```

---

### **13. Static Methods and Properties**
Static methods and properties belong to the class rather than an instance.

#### Example:
```php
class Math {
    public static $value = 42;

    public static function multiply($x, $y) {
        return $x * $y;
    }
}

echo Math::$value; // Outputs: 42
echo Math::multiply(3, 4); // Outputs: 12
```

---

### **14. isset() Function**
The `isset()` function checks if a variable is set and not `NULL`.

#### Example:
```php
$var = "Hello, World!";
if (isset($var)) {
    echo "Variable is set.";
} else {
    echo "Variable is not set.";
}
```

### **15. Dependency Injection**
Dependency Injection reduces dependencies between classes by injecting the required objects from outside.

#### Example:
```php
class Database {
    public function connect() {
        return "Connected to the database!";
    }
}

class UserRepository {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function fetchAll() {
        return $this->database->connect();
    }
}

$db = new Database();
$repo = new UserRepository($db);
echo $repo->fetchAll();
```

---

### **16. Singleton Design Pattern**
Ensures a class has only one instance throughout its lifecycle.

#### Example:
```php
class Singleton {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

// Usage
$instance = Singleton::getInstance();
```

---

### **17. Factory Design Pattern**
Simplifies object creation without exposing the instantiation logic.

#### Example:
```php
interface Car {
    public function drive();
}

class Tesla implements Car {
    public function drive() {
        echo "Driving a Tesla!";
    }
}

class BMW implements Car {
    public function drive() {
        echo "Driving a BMW!";
    }
}

class CarFactory {
    public static function create($type) {
        switch ($type) {
            case 'Tesla': return new Tesla();
            case 'BMW': return new BMW();
            default: throw new Exception("Unknown car type");
        }
    }
}

$car = CarFactory::create('Tesla');
$car->drive();
```

---

### **18. PHP 8 Features**
Key new features in PHP 8 include `match`, `named arguments`, `attributes`, and `union types`.

#### Example of `match`:
```php
$status = 404;

$message = match ($status) {
    200 => 'OK',
    404 => 'Not Found',
    500 => 'Server Error',
    default => 'Unknown Status',
};

echo $message; // Outputs: Not Found
```

---

### **19. Autoloading with Composer**
Composer autoloads classes automatically using PSR-4.

#### Example:
```json
{
    "autoload": {
        "psr-4": {
            "App\": "src/"
        }
    }
}
```

Run `composer dump-autoload` to generate the autoloader.

---

### **20. Regular Expressions**
Used for pattern matching.

#### Example:
```php
$pattern = "/php/i";
$text = "PHP is awesome!";
if (preg_match($pattern, $text)) {
    echo "Match found!";
}
```

---

### **21. Sessions in PHP**
Sessions allow data to persist between requests.

#### Example:
```php
session_start();
$_SESSION['user'] = 'John Doe';
echo $_SESSION['user'];
```

---

### **22. File Handling in PHP**
File handling lets you read, write, or append files.

#### Example:
```php
$file = fopen("example.txt", "w");
fwrite($file, "Hello, file handling!");
fclose($file);

echo file_get_contents("example.txt");
```

---

### **23. Streams in PHP**
Streams handle data input/output efficiently.

#### Example:
```php
$stream = fopen("php://temp", "r+");
fwrite($stream, "Hello, Stream!");
rewind($stream);
echo stream_get_contents($stream);
```

---

### **24. PHP Error Handling**
Use `try-catch` to handle errors gracefully.

#### Example:
```php
try {
    $number = 5 / 0;
} catch (DivisionByZeroError $e) {
    echo "Cannot divide by zero!";
}
```

---

### **25. Reflection API**
Reflection allows runtime analysis of classes, methods, and properties.

#### Example:
```php
class Test {
    private $property = "value";

    public function method() {
        return $this->property;
    }
}

$reflection = new ReflectionClass('Test');
$methods = $reflection->getMethods();

foreach ($methods as $method) {
    echo $method->getName();
}
```
