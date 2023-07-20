<?php
namespace app\Interfaces;

interface CategoryRepositoryInterface{
    
    public function allCategories();
     public function storeCategory($validator);
    public function findCategory($id);
    public function updateCategory($validator, $id); 
     public function destroyCategory($id);
}