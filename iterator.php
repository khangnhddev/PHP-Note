<?php
//Using Iterator
//	class BookList implements Iterator {
//		private $books = [];
//		private $currentIndex = 0;
//		
//		public function addBook($book) {
//			$this->books[] = $book;
//		}
//		
//		// Required by the Iterator interface
//		public function rewind(): void {
//			$this->currentIndex = 0;
//		}
//		
//		public function current(): mixed {
//			return $this->books[$this->currentIndex];
//		}
//		
//		public function key(): mixed {
//			return $this->currentIndex;
//		}
//		
//		public function next(): void {
//			++$this->currentIndex;
//		}
//		
//		public function valid(): bool {
//			return isset($this->books[$this->currentIndex]);
//		}
//	}	
	
	
	// Using IteratorAggregate to make more simple
	
	class BookList implements IteratorAggregate {
		private $books = [];
		
		public function addBook($book) {
			$this->books[] = $book;
		}
		
		// Implement IteratorAggregate's getIterator
		public function getIterator(): Traversable {
			return new ArrayIterator($this->books);
		}
	}
	
	$bookList = new BookList();
	$bookList->addBook("The Great Gatsby");
	$bookList->addBook("1984");
	$bookList->addBook("To Kill a Mockingbird");
	
	foreach ($bookList as $key => $book) {
		echo "{$key}: {$book}\n";
	}
?>