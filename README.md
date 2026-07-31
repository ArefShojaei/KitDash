# 🎯 KitDash

**KitDash** is a lightweight and flexible PHP utility library designed to speed up development by providing reusable, well-tested helper functions and components.  
Inspired by [Laravel](https://laravel.com) and [Lodash](https://lodash.com).

---

## ✨ Features

- 🚀 **Support Utilities** – Array & String helpers + Binary encoder
- 🏗️ **Data Structures** – Stack, Queue, HashTable, Tree, Graph
- 📁 **File System** – File, Directory, Archive (Zip) utilities
- 🌐 **Network** – URL parser & HTTP Request client
- 📦 **JSON** – Simple encode / decode with validation
- 🧪 **Well Tested** – PHPUnit coverage
- ⚡ **Zero Dependencies** – Pure PHP 8.0+
- 📚 **Clean Architecture** – Interfaces + Traits

---

## 📥 Installation

### With Composer (Recommended)

```bash
composer require arefshojaei/kitdash
```

### Manual Installation

```bash
git clone https://github.com/ArefShojaei/KitDash.git
cd KitDash
composer install
```

---

## 🚀 Quick Start

### Array Utilities

```php
use Kit\Support\Arr;

Arr::add(["a" => 1], "b", 2); // ['a' => 1, 'b' => 2]
Arr::get(["a" => 1], "a"); // 1
Arr::take([1, 2, 3, 4, 5], 3); // [1, 2, 3]
Arr::nth([10, 20, 30], 1); // 20
Arr::drop([1, 2, 3], 1); // [1, 3] or shifted
Arr::compact([0, "", false, "hello"]); // ['hello']
Arr::except(["a" => 1, "b" => 2], "a"); // ['b' => 2]
Arr::first([1, 2, 3]); // 1
Arr::last([1, 2, 3]); // 3
Arr::only(["a" => 1, "b" => 2], ["a"]); // ['a' => 1]
Arr::fill([1, 2, 3], "x"); // ['x', 'x', 'x']
Arr::sort([3, 1, 4]); // [1, 3, 4]
Arr::unique([1, 2, 2, 3]); // [1, 2, 3]
Arr::concat([1, 2], [3, 4]); // merged array
Arr::random([1, 2, 3, 4]); // random element
Arr::chunk([1, 2, 3, 4], 2); // [[1,2],[3,4]]
Arr::join(["A", "B"], " "); // "A B"
Arr::difference([1, 2, 3], [3, 4]); // [1, 2]
```

### String Utilities

```php
use Kit\Support\Str;

Str::upper("hello"); // HELLO
Str::lower("HELLO"); // hello
Str::title("hello world"); // Hello World
Str::snake("fooBar"); // foo_bar
Str::kebab("fooBar"); // foo-bar
Str::camel("foo_bar"); // fooBar
Str::limit("hello world", 5); // hello...
Str::slug("My Awesome Post"); // My-Awesome-Post
Str::contains("hello world", "world"); // true
Str::startsWith("hello", "he"); // true
Str::endsWith("hello", "lo"); // true
Str::toBase64("hello"); // aGVsbG8=
Str::e("<script>"); // &lt;script&gt;
Str::split("a,b,c", ","); // ['a', 'b', 'c']
Str::repeat("ha", 3); // hahaha
Str::reverse("hello"); // olleh
```

### Binary Encoder

```php
use Kit\Support\Binary;

$binary = Binary::create("secret-key");

$encoded = $binary->encode("Hello");
$decoded = $binary->decode($encoded); // Hello
```

### Data Structures

#### Stack (LIFO - Last In First Out)

```php
use Kit\Structure\Stack;

$stack = new Stack();
$stack->push("first");
$stack->push("second");

$stack->pop(); // 'second'
$stack->isEmpty(); // false
$stack->toArray(); // ['first']
```

#### Queue (FIFO)

```php
use Kit\Structure\Queue;

$queue = new Queue();
$queue->enqueue("first");
$queue->enqueue("second");

$queue->dequeue(); // 'first'
$queue->toArray(); // ['second']
```

#### HashTable

```php
use Kit\Structure\HashTable;

$table = new HashTable();
$table->set("user_1", "John");
$table->get("user_1"); // John
$table->has("user_1"); // true
```

#### Tree

```php
use Kit\Structure\Tree\Tree;

$tree = new Tree("Root");
$tree->add("Child 1");
$tree->add("Child 2");

$tree->toArray();
```

#### Graph

```php
use Kit\Structure\Graph\Graph;

$graph = new Graph();
$node1 = $graph->addNode("A");
$node2 = $graph->addNode("B");

$graph->addEdge($node1, $node2);
$graph->getNode("A");
```

### File System

```php
use Kit\Fs\File;
use Kit\Fs\Directory;
use Kit\Fs\Archive;

// File
File::save("file.txt", "content");
File::get("file.txt");
File::has("file.txt");
File::append("file.txt", " more");
File::delete("file.txt");
File::copy("a.txt", "b.txt");
File::size("file.txt");
File::extension("file.txt"); // txt
File::hash("file.txt"); // sha256

// Directory
Directory::create("path/to/dir");
Directory::files("path");
Directory::directories("path");
Directory::clean("path");
Directory::delete("path");
Directory::size("path");
Directory::isEmpty("path");

// Archive (Zip)
$archive = new Archive("backup.zip");
$archive->addFile("file.txt");
$archive->addFromString("readme.md", "# Hello");
$archive->addDirectory("src");
$archive->comment("Backup");
$archive->extract("output");
$archive->close();
```

### Network

```php
use Kit\Net\Url;
use Kit\Net\Request;

// URL Parser
$url = Url::create("https://example.com/path?name=Aref");
$url->host(); // example.com
$url->protocol(); // https
$url->path(); // /path?name=Aref
$url->query(); // ['name' => 'Aref']
$url->origin(); // https://example.com

// HTTP Request
$posts = Request::get("https://jsonplaceholder.typicode.com/posts");
$post = Request::post("https://jsonplaceholder.typicode.com/posts", [
    "title" => "New Post",
    "body" => "Content",
]);
```

### JSON

```php
use Kit\Json\Json;

$json = Json::encode(["name" => "Aref", "age" => 25]);
$data = Json::decode($json); // object
$data = Json::decode($json, true); // array
```

### Project Structure

```txt
src/
├── Support/                 # Array, String, Binary helpers
│   ├── Arr.php
│   ├── Str.php
│   ├── Binary.php
│   ├── Interfaces/
│   └── Traits/
│       ├── Array/
│       └── String/
│
├── Structure/               # Data Structures
│   ├── Stack.php
│   ├── Queue.php
│   ├── HashTable.php
│   ├── Tree/
│   ├── Graph/
│   └── Interfaces/
│
├── Fs/                      # File System
│   ├── File.php
│   ├── Directory.php
│   ├── Archive.php
│   └── Interfaces/
│
├── Net/                     # Network utilities
│   ├── Url.php
│   ├── Request.php
│   ├── Http.php
│   ├── Constants/
│   ├── Exceptions/
│   └── Interfaces/
│
└── Json/                    # JSON helpers
    ├── Json.php
    ├── Exceptions/
    └── Interfaces/
```

---

## 💡 Practical Examples

### Input Data Cleaning

```php
use Kit\Support\{Arr, Str};

$input = [
    "name" => "  John Doe  ",
    "email" => "JOHN@EXAMPLE.COM",
    "description" => "",
    "website" => null,
];

// Clean input
$input["name"] = Str::trim($input["name"]);
$input["email"] = Str::lower($input["email"]);

// Remove empty values
$clean = Arr::compact($input);

// Result: ['name' => 'John Doe', 'email' => 'john@example.com']
```

### Working with URLs and Slugs

```php
use Kit\Support\Str;

$title = "How to Build a PHP Application";

// Create URL-friendly slug
$slug = Str::slug($title); // 'how-to-build-a-php-application'

// Create filename
$filename = $slug . ".md"; // 'how-to-build-a-php-application.md'

// Check URL patterns
$isValid = Str::startsWith("https://example.com/api", "https://");
```

### Working with Configuration

```php
use Kit\Support\Arr;

$config = [
    "app" => ["name" => "MyApp", "version" => "1.0"],
    "db" => ["host" => "localhost", "port" => 3306],
    "cache" => ["driver" => "redis"],
];

// Get specific values
$appName = Arr::get($config, "app"); // Using array keys
$dbHost = Arr::get($config, "db");

// Add new config
$newConfig = Arr::add($config, "queue", ["driver" => "redis"]);

// Get only app config
$appConfig = Arr::only($config["app"], ["name", "version"]);
```

### File Operations

```php
use Kit\Fs\File;

// Save configuration
$config = ["app" => "MyApp", "debug" => true];
File::save("config.json", json_encode($config));

// Read configuration
if (File::has("config.json")) {
    $content = File::get("config.json");
    $config = json_decode($content, true);
}

// Create backup
$original = File::get("data.txt");
File::save("data.backup.txt", $original);
```

### Using Data Structures

```php
use Kit\Structure\{Stack, HashTable};

// Undo/Redo functionality with Stack
$stack = new Stack();
$stack->push("action1");
$stack->push("action2");
$stack->push("action3");

$lastAction = $stack->pop(); // 'action3'

// Cache with HashTable
$cache = new HashTable();
$cache->set("user:1", ["name" => "John", "email" => "john@example.com"]);
$cache->set("user:2", ["name" => "Jane", "email" => "jane@example.com"]);

$user = $cache->get("user:1");
$hasUser = $cache->has("user:1"); // true
```

---

## 🧪 Testing

### Install Development Dependencies

```bash
composer install
```

### Run All Tests

```bash
vendor/bin/phpunit
```

### Run Specific Test

```bash
vendor/bin/phpunit --filter "testArrayAdd"
```

### Run Tests in Specific File

```bash
vendor/bin/phpunit tests/Unit/Support/ArrTest.php
```

### Generate Code Coverage Report

```bash
vendor/bin/phpunit --coverage-html coverage
```

### Run Tests with Verbose Output

```bash
vendor/bin/phpunit -v
```

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. **Fork** the repository
2. Create a new **branch** (`git checkout -b feature/amazing-feature`)
3. **Commit** your changes (`git commit -m 'Add amazing feature'`)
4. **Push** to the branch (`git push origin feature/amazing-feature`)
5. Open a **Pull Request**

### Contributing Guidelines

- All new functions must be tested
- Follow PSR-12 coding standards
- Commit messages should be clear and descriptive
- Update documentation if API changes
- Add examples for new utilities

---

## 🚀 Performance

KitDash is designed for performance:

- **Zero external dependencies** - Fast installation and updates
- **Static methods** - No object instantiation overhead
- **Optimized algorithms** - Efficient implementations
- **Minimal memory footprint** - Small library size

### Benchmark Results

```
Array Operations: ~0.001ms per operation
String Operations: ~0.0001ms per operation
File Operations: I/O limited
```

---

## 🔒 Security

- **No external dependencies** - No supply chain vulnerabilities
- **Regular security audits** - Code reviewed for vulnerabilities
- **Input validation** - Safe string handling
- **Best practices** - Follow OWASP guidelines

---

## 👨‍💻 Author

**Aref Shojaei**

- 📧 Email: [arefshojaei82@gmail.com](mailto:arefshojaei82@gmail.com)
- 🐙 GitHub: [@ArefShojaei](https://github.com/ArefShojaei)
- 📦 Packagist: [arefshojaei/kitdash](https://packagist.org/packages/arefshojaei/kitdash)

---

## 🙏 Acknowledgments

- Inspired by [Laravel Helpers](https://laravel.com/docs/helpers)
- Inspired by [Lodash](https://lodash.com)
- Thanks to all [contributors](https://github.com/ArefShojaei/KitDash/graphs/contributors)

---

## 📞 Support & Community

### Need Help?

- 📖 **Documentation** - See examples above
- 🐛 **Found a bug?** - Open an [Issue](https://github.com/ArefShojaei/KitDash/issues)
- 💬 **Have a question?** - Start a [Discussion](https://github.com/ArefShojaei/KitDash/discussions)
- 📧 **Email** - arefshojaei82@gmail.com

---

## 🌟 Show Your Support

If this project helped you, please give it a **⭐ Star on GitHub!**

It helps us reach more developers and keep improving the library.

<div align="center">

**[⭐ Star us on GitHub](https://github.com/ArefShojaei/KitDash)**

</div>
