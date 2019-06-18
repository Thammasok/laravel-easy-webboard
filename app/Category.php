<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $table = 'wb_category';
    protected $fillable = ['name', 'description'];
    public $timestamps = true;
    
    public function getAllCategory(){
        $data = array();
        $categoryLists = Category::where()->orderBy('name', 'asc')->get();
        if($categoryLists){
            foreach($categoryLists as $category){
                array_push($data, array(
                    'id'            => $category->post_id,
                    'name'          => $category->post_title, 
                    'description'   => $category->description,
                    'created_at'    => $category->created_at
                ));
            }
        }

        return $data;
    }

}
