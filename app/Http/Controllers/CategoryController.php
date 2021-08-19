<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryEloquent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryEloquent
     */
    protected $repository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryEloquent $repository
     */
    public function __construct(CategoryRepositoryEloquent $repository){
        $this->repository = $repository;
    }

    /**
     * Display a listing of the categories.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->all());
    }
}
