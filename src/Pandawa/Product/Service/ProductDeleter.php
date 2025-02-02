<?php

declare(strict_types=1);

namespace Pandawa\Product\Service;

use Pandawa\Product\Command\DeleteProduct;
use Pandawa\Product\Model\Product;
use Pandawa\Product\Repository\ProductRepository;

final class ProductDeleter {
  public function __construct(private ProductRepository $repository) {}

  public function delete(DeleteProduct $delete): Product {
    $product = $this->repository->find($delete->origin()->get('product'));

    if ($product) $this->repository->remove($product);

    return $product;
  }
}