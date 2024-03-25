 <?php 
	
 class Route{
	 protected $routes=[];

	 public function addRoute($url,$callback){
		 $this->routes[]=$url;
		 $bindCallback=$callback->bindTo($this,Route::class);
		 $bindCallback();
	 }
 }

 $route=new Route();

 $route->addRoute('/home',function(){
	 	echo "Add route success";
		var_dump($this->routes);
 });
	
// $addRoute=function(){
// 	echo $this->routes;
// };
// $myBindClosure=$addRoute->bindTo($route,Route::class);
// $myBindClosure();

 ?> 