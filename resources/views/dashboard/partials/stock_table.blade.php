<div  id="stockTable">
    <table class="table table-striped">
    <thead>
        <tr>
            <th class="hidden-xs">{{__('UPC/EAN/ISBN')}}</th>
            <th>{{__('Item Name')}}</th>
            <th>{{__('Quantity')}}</th>
            <th>{{__('Total')}}</th>
            <th>{{__('Expire Date')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stock_limit_items as $item)
        <tr>
            <td class="hidden-xs">{{$item->upc_ean_isbn}}</td>
            <td>{{$item->item_name}}</td>
            <td>{{$item->qty}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{!empty($item->expire_date) ? date('d M Y', strtotime($item->expire_date)) : ""}}</td>
        </tr>
        @endforeach
    </tbody>
</table><br>

    @include('partials.pagination', ['items'=>$stock_limit_items, 'index_route'=>route('items.stock')])
</div>
