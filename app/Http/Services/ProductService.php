<?php

namespace App\Http\Services;
use App\Entities\Brand;
use App\Entities\Category;
use App\Entities\Product;
use App\Entities\Sku;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Collection;
use stdClass;

class ProductService
{
	public function __construct(
		private ProductRepositoryInterface $productRepository,
		private CategoryService $categoryService,
		private BrandService $brandService,
	) {}

	public function create(Product $product): stdClass
	{
		return (object) $this->productRepository->create($product)->toArray();
	}

	public function update(Product $product): stdClass
	{
		return (object) $this->productRepository->update($product)->toArray();
	}

	public function delete(int $id): bool
	{
		return $this->productRepository->delete($id);
	}

	public function find(int $id): stdClass
	{
		$result = $this->productRepository->find($id)->toArray();
		$product = Product::makeFromArray($result)->toArray();
		$product['brand'] = Brand::makeFromArray($result)->toArray();
		$product['category'] = Category::makeFromArray($result)->toArray();
		return (object) $product;
	}

	public function findAll(int $page): Collection
	{
		$products = $this->productRepository->findAll($page);
		return $products;
	}
}