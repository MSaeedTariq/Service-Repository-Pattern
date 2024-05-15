<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($data){
        return $this->postRepository->create($data);
    }

    public function postsAll()
    {
        return $this->postRepository->all();
    }

    public function postSingle($id){
        return $this->postRepository->find($id);
    }

    public function updatePost($id ,$data){
        return $this->postRepository->update($id, $data);
    }

    public function delete($id){
        return $this->postRepository->delete($id);
    }
}