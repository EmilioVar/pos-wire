<?php

namespace App\Livewire\Products;

use App\Models\Table;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductSelector extends Component
{
    public $products;

    public function mount() {
        $this->products = [];
    }

    #[On('groupSelected')]
    public function loadProducts($groupId)
    {
        $this->products = Product::where('group_id', $groupId)->get();
    }

    public function productSelected($productId)
    {
        if(session()->has('tableSelected')) {
            $table = Table::find(session('tableSelected'));
            $product = Product::find($productId);
            
            $existingProduct = $table
                ->products()
                ->where('product_id', $productId)
                ->first();
    
            if ($existingProduct) {
                $existingProduct->pivot->increment('quantity');
            } else {
                $table->products()->attach($productId, ['quantity' => 1,'price'=>$product->price]);
            }
    
            $this->dispatch('productSelect');
            $this->dispatch('updateTotalAmount');
            $this->dispatch('renderSelectItemInProuctsTpv');
        } else {
            dd('seleccione una mesa!');
        }
    }
    
    public function render()
    {
        return view('livewire.products.product-selector');
    }
}
