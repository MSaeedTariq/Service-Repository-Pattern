<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function create(array $post){
        return $this->post->create($post);
    }

    public function all(){
        return $this->post->all();
    }

    public function find($id){
        return $this->post->find($id);
    }

    public function update($id, $data){
        $post = $this->post->find($id);
        if($post){
           $post->update($data);
            return $post;
        }
        return "error";
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        if($post){
           $post->delete();
            return true;
        }
        return false;
    }
}