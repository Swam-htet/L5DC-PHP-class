<html>
    <?php 
    class Person{
        public $name = "Someone";
        function display(){
            echo "This is person=>name is $this->name";
        }
    };

    $person_one = new Person;
    $person_one->display();
    ?>
</html>