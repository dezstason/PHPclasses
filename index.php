<?

// Создание классов и методов

class user{
    public function readAll(){
        echo "All comments </br>";
    }

    public function addComment($text){
        echo "Added a comment - " . $text . "</br>";
    }
    // Функция для вызова метода deleteMyComment, так как из-за его защищености, вызов доступен только внутри класса
    public function delete($id){
        $this -> deleteMyComment($id);
    }
    // Метод, доступный только классу USER
    protected function deleteMyComment($id){
        echo "Your comment with id = " . $id . " was deleted </br>";
    }
}

// Класс имеет методы класса USER, кроме метода deleteMyComment, а также имеет доступный только ему deleteChosenComment
class moderator extends user{

    public function delete2($id){
        $this -> deleteChosenComment($id);
    }
    private function deleteChosenComment($id){
        echo "Selected comment with id = " . $id . " was deleted </br>";
    }
}
// Класс имеет методы класса USER, кроме метода deleteMyComment, а также имеет доступный только ему deleteAll
class admin extends user{

    public function delete3(){
        $this -> deleteAll();
    }

    private function deleteAll(){
        echo "All comments were deleted </br>";
    }
}

// Создание объектов, в нашем случае пользователей
$user = new user();
$moderator = new moderator();
$admin = new admin();

// Вызов всех методов для USER
echo $user -> readAll();
echo $user -> addComment('user comment');
echo $user -> delete(2);

// Вызов всех методов для MODERATOR
echo $moderator -> readAll();
echo $moderator -> delete2(7);

// Вызов всех методов для ADMIN
echo $admin -> readAll();
echo $admin -> addComment('admin comment');
echo $admin -> delete3();

?>