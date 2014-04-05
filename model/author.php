<?php

class ModelAuthor extends Model {
    // в єтом класе как и в родителе его нет
    public function getAuthors() {
        $query = $this->db->query("SELECT name FROM author"); // когда мы пишем $this->db по сути мы ишим в этом класе
        // или в классе родителе поле $db

        //$this->db - єто обект DBMySQL а у него уже есть метод query

        // тоесть $this->db - мы получим из реестра то что мы туда под этот ключь поместили

        return $query->rows;
    }

    public function getAuthor($author_id) {
        $query = $this->db->query("SELECT text from article where author_id = " . $author_id);

        return $query->rows;
    }
}