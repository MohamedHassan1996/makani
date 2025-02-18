<?php

namespace App\Http\Controllers\API\Dashboard\Product;

use App\Models\Product\ProductImage;
use Illuminate\Http\Request;
use App\Utils\PaginateCollection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Upload\UploadService;
use App\Services\Product\ProductService;
use App\Services\Product\ProductImageService;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\AllProductResouce;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\AllProductCollection;

class ProductController extends Controller
{
  protected $productService;
  protected $uploadService;
  protected $productImageService;
    public function __construct(ProductService $productService, UploadService $uploadService,ProductImageService $productImageService)
    {
        $this->productService =$productService;
        $this->uploadService = $uploadService;
        $this->productImageService = $productImageService;
        $this->middleware('auth:api');
        $this->middleware('permission:all_products',['only'=>['index']]);
        $this->middleware('permission:create_product',['only'=>['create']]);
        $this->middleware('permission:edit_product',['only'=>'edit']);
        $this->middleware('permission:update_product',['only'=>'update']);
        $this->middleware('permission:delete_product',['only'=>'delete']);
    }

    public function index(Request $request)
    {
        $products = $this->productService->all();

        return response()->json(
            new AllProductCollection(PaginateCollection::paginate($products, $request->pageSize?$request->pageSize:10))
            );

    }
    public function create(CreateProductRequest $createProductRequest)
    {
        // CreateProductRequest $createProductRequest
        try {
            DB::beginTransaction();
            $data=$createProductRequest->validated();
            // $data=$request->all();
        
            $product =  $this->productService->create($data);
            if (isset($data['images'])) {
                foreach ($data['images'] as $key => $image) {
                    $path = $this->uploadService->uploadFile($image['path'], "products/$product->id");
                    $this->productImageService->create([
                        'productId' => $product->id,
                        'path' => $path
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'message' => __('messages.success.created')
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function edit(Request $request)
    {
        $product =$this->productService->edit($request->productId);
        return response()->json(
            new ProductResource($product)
            ,200);
    }
    public function update(UpdateProductRequest $updateProductRequest)
    {
        try {
            DB::beginTransaction();
        $product = $this->productService->update($updateProductRequest->validated());
            if (isset($updateProductRequest['images'])) {
                foreach ($updateProductRequest['images'] as $key => $image) {
                    if (is_string($image['path'])) {
                        continue;
                    }
                    $path = $this->uploadService->uploadFile($image['path'], "products/$product->id");
                    $productImage = new ProductImage();
                    $productImage->path = $path;
                    $productImage->product_id = $updateProductRequest['productId'];
                    $productImage->save();
                }
            }
            DB::commit();
            return response()->json([
                'message' => __('messages.success.updated')
           ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function delete(Request $request)
    {
       try {
           DB::beginTransaction();
           $this->productService->delete($request->productId);
           DB::commit();
           return response()->json([
            'message' => __('messages.success.deleted')
        ], 200);

        } catch (\Throwable $th) {
           DB::rollBack();
           throw $th;
       }
    }
    public function changeStatus(Request $request)
    {
        $this->productService->changeStatus($request->productId, $request->isPublished);
        return response()->json([
            'message' => __('messages.success.updated')
        ], 200);
    }
}
