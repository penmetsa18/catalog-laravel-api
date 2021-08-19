<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepositoryEloquent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductController extends Controller
{

    /**
     * @var ProductRepositoryEloquent
     */
    protected $repository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryEloquent $repository
     */
    public function __construct(ProductRepositoryEloquent $repository){
        $this->repository = $repository;

        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the products.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->repository->with('category')->all());
    }

    /**
     * Store a newly created product in storage.
     *
     * @param ProductRequest $request
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function store(ProductRequest $request): JsonResponse
    {
        return response()->json($this->repository->create($request->all()));
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $product = $this->repository->with('category')->find($id);
        return response()->json($product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidatorException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        return response()->json($this->repository->update($request->all(), $id));
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->repository->delete($id));
    }
}
