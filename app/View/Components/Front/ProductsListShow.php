<?php

namespace App\View\Components\Front;

use Illuminate\View\Component;
use App\Models\Product;

class ProductsListShow extends Component
{
    public $title = 'List of Products';

    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $method = 'all', $paging = null, $querysearch = null)
    {
        $this->title = $title ?? $this->title;

        if ($querysearch) {
            $this->products = $this->searchProducts($querysearch, $method, $paging);
        } else {
            $this->products =  $this->getProducts($method, $paging);
        }

        if ($paging) {
            $this->products = $this->products->paginate($paging);
        }
    }

    private function getProducts($method)
    {
        return $this->$method();
    }

    private function searchProducts($querysearch, $method)
    {
       return collect([]);
    }

    public function productRating($product)
    {
        return $product->feedbackProducts->avg('rating') ?? 0;
    }

    public function ratingGenerateStar($rating)
    {
        $star = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $star .= '<i class="fas fa-star text-warning"></i>';
            } else {
                $star .= '<i class="far fa-star text-warning"></i>';
            }
        }
        return $star;
    }

    public function productRatedTimes($product)
    {
        return $product->feedbackProducts->count();
    }

    private function all()
    {
        return Product::active()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.products-list-show');
    }
}
