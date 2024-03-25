<?php
trait Query{
	public function showClassName(){
		return 'Show class name '.$this->table;
	}
}

class User{
	use Query;
	protected $table='Users';
}

class Post{
	use Query;
	protected $table='Posts';
}

$user=new User();
$post=new Post();

var_dump($user->showClassName());
var_dump($post->showClassName());