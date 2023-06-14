<?php

namespace App;

use App\AppModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAttribute extends AppModel
{
    use HasFactory;

    protected $fillable = ['upc_ean_isbn', 'name', 'item_id', 'quantity', 'exp_date', 'selling_price', 'cost_price', 'image', 'status'];
    protected $appends = ['qty'];

    public function getAll($item_id = null)
    {
        // $attribute_array = [];
        $attributes = !empty($item_id) ? ItemAttribute::where('item_id', $item_id)->get() : ItemAttribute::all();
        // if (!empty($attributes)) {
        //     foreach ($attributes as $value) {
        //         $attribute_array[$value->id] = $value;
        //     }
        // }
        return $attributes;
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'attribute_id');
    }

    public function getQtyAttribute()
    {
        $qty = $this->quantity;
        if ($this->inventories->count()) {
            foreach($this->inventories as $inventory) {
                $qty += $inventory->in_out_qty;
            }
        }
        return $qty;
    }

}
