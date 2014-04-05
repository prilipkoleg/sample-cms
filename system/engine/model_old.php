<?php
class ModelOld {
    private $registry;

    public function __construct($registry){
        $this->registry = $registry;

    }

    public function getAuthors()
    {
        $sql = "SELECT name FROM author";
        $result = $this->DataBase->query($sql);
        return $result->rows;

        // а так почемуто не работает
        /*   parent:: __construct($this->host, $this->user, $this->pass, $this->dbName);

           $sql = "SELECT name FROM author";
           $result = parent::query($sql);
           return $result->rows;*/
    }

    public function getAuthor($id)
    {
        if($id){
            $DB = new DBMySQL('localhost', 'root', '', 'blog-test');
            $sql = "SELECT text from article where author_id = " . $id;
            $result = $DB->query($sql);
            return $result->rows;
        }
        else {
            return array(
                '0' => array(
                    'text'=> 'ID = 0 !'
                )
            );
        }
    }

    public function getCategories()
    {
        $DB = new DBMySQL('localhost', 'root', '', 'blog-test');
        $sql = "SELECT title from category";
        $result = $DB->query($sql);
        return $result->rows;
    }

    public function getCategory($id)
    {
        if($id){
            $DB = new DBMySQL('localhost', 'root', '', 'blog-test');
            $sql = "SELECT text from article where category_id = " . $id;
            $result = $DB->query($sql);
            return $result->rows;
        }
        else {
            return array(
                '0' => array(
                    'text'=> 'ID = 0 !'
                )
            );
        }
    }
}
