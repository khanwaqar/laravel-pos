<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'sale_id');
    }

    public function getAllBySaleId($sale_id)
    {
        return $this->where('sale_id', $sale_id)->get();
    }

    public function saveSaleItem($item, $sale_id)
    {
        $this->sale_id = $sale_id;
        $this->item_id = $item->item_id;
        $this->attribute_id = $item->attribute_id;
        $this->cost_price = $item->cost_price;
        $this->selling_price = $item->selling_price;
        $this->quantity = $item->quantity;
        $this->total_cost = $item->total_cost;
        $this->total_selling = $item->total_selling;
        $this->save();
    }

    public function deleteBySaleId($sale_id)
    {
        $sale_items = $this->where('sale_id', $sale_id)->get();
        if ($sale_items->count() > 0) {
            foreach ($sale_items as $sitem) {
                $item = new Item();
                $item->updateItemQty($sitem->item_id, $sitem->qty,$sitem->attribute_id);
                $sitem->delete();
            }
        }
        
    }
}
