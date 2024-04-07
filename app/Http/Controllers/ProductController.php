<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Enums\HttpStatusCodeEnum;
use App\Http\Services\ProductService;
use App\Utils\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service,
    ) {}

    public function create(Request $request)
    {
        try {
            
            $product = $this->service->create(Product::makeFromArray($request->all()));
            return response()->json($product, HttpStatusCodeEnum::CREATED->value);

        } catch (\Throwable $th) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::SERVER_ERROR->value);
        }
    }

    public function update(Request $request)
    {
        try {

            $product = $this->service->update(Product::makeFromArray($request->all()));
            return response()->json($product, HttpStatusCodeEnum::OK->value);

        } catch (ModelNotFoundException $ne) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::NOT_FOUND->value);
        } catch (\Throwable $th) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::SERVER_ERROR->value);
        }
    }

    public function delete(int $id)
    {
        try {
            
            $isDeleted = $this->service->delete($id);
            return response()->json([
                'id'=> $id,
                'deleted'=> $isDeleted
            ], HttpStatusCodeEnum::OK->value);

        }  catch (ModelNotFoundException $ne) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::NOT_FOUND->value);
        } catch (\Throwable $th) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::SERVER_ERROR->value);
        }
    }

    public function find(int $id)
    {
        try {
            
            $product = $this->service->find($id);
            return response()->json($product, HttpStatusCodeEnum::OK->value);

        } catch (ModelNotFoundException $ne) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::NOT_FOUND->value);
        } catch (\Throwable $th) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::SERVER_ERROR->value);
        }
    }

    public function findAll(Request $request)
    {
        try {
            
            $products = $this->service->findAll($request->query('page', 0));
            return response()->json([
                'data'=> $products,
                'pagination'=> [
                    'page'=> $request->query('page', 0),
                    'limit'=> 10,
                    'items'=> $products->count()
                ]
            ], HttpStatusCodeEnum::OK->value);

        } catch (\Throwable $th) {
            return response()->json(Log::error($th), HttpStatusCodeEnum::SERVER_ERROR->value);
        }
    }
}
