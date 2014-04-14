<?php

class ModelAuthor extends Model {
    
    public function getAuthors() {
        $query = $this->db->query("SELECT name FROM author"); 
        
        return $query->rows;
    }

    public function getAuthor($author_id) {
        $query = $this->db->query("SELECT text from article where author_id = " . $author_id);

        return $query->rows;
    }
}