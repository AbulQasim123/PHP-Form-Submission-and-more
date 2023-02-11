<?php 
    $a = 1;
    $b = &$a;
    $b = "2$b";
    echo $a. ",". $b;
?>
<?php 
    // Data and Function are called object
    echo "<br>";
    class fruit{
        public $name;
        public $color;
        function show(){
            echo $this->name. " - " .$this->color;
        }
    }
    $apple = new fruit();
    $apple->name = 'Apple';
    $apple->color = 'Light Red';
    $apple->show();
    echo '<br>';
        // __constructor
    class car{
        public $name;
        public $color;
        function __construct($name, $color){
            $this->name= $name;
            $this->color= $color;
            
        }    
        function get_name(){
            return $this->name;
        }
        function get_color(){
            return $this->color;
        }
    }
    $fourwheeler = new car("Volvo", "White");
    echo $fourwheeler->get_name();
    echo '<br>';
    echo $fourwheeler->get_color();  

        // __destruct
    class human{
        public $name;
        public $color;
        public $height;
        public $weight;

        function __construct($name,$color,$height,$weight){
            $this->name = $name;
            $this->color = $color;
            $this->height = $height;
            $this->weight = $weight;
        }
        function __destruct(){
            echo "<br>This man is {$this->name} and color is {$this->color} and height is {$this->height} fit and weight {$this->weight} kg.";
        }
    }
    $human = new human('AbulQasim', 'White', '6', '50');

        // inheritence
    class moreabouthuman extends human{
        public $name;
        public $color;
        public $height;
        public $weight;
        public $profession;
        function __construct($name,$color,$height,$weight,$profession){
            $this->profession = $profession;
        }
        function intro(){
            echo "<br>This man is {$this->name} and color is {$this->color} and height is {$this->height} fit and weight {$this->weight} kg. and profession is {$this->profession}"; 
        }
    }
    $Man = new moreabouthuman('AbulQasim', 'White', '6', '50','Doctor');
    $Man->intro();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <br>
</body>
</html>


