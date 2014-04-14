<?php

class ModelCategories extends Model {
    
    public function getCategories() {
        $query = $this->db->query("SELECT title from category"); 
        
        return $query->rows;
    }

    public function getCategory($category_id) {
        $query = $this->db->query("SELECT text from article where category_id = " . $category_id);

        return $query->rows;
    }
}