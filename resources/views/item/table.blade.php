<div class="" id="itemTable">
    <table class="table table-bordered table-striped table-responsive" id="myTable1">
        <thead>
            <tr>
                {{-- <th class="hidden-xs">{{__('SKU')}}</th> --}}
                <th>{{trans('item.item_name')}}</th>
                <th class="hidden-xs">{{__('Category')}}</th>
                <th class="hidden-xs">{{trans('item.qty')}}</th>
                <th class="hidden-xs">{{trans('item.cost_price')}}</th>
                <th>{{trans('item.selling_price')}}</th>
                <th class="hidden-xs">{{trans('item.status')}}</th>
                <th class="text-center">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>

            {{-- @php
            print_r($items);
            @endphp --}}

        @foreach($items as $value )

        @php
        $avatar = asset('/dist/img/no-foto.png');
        if (trim($value->avatar) != 'no-foto.png') {
            $avatar = $value->fileUrl();
        }
        @endphp

            <tr>
                {{-- <td class="hidden-xs">{{ $value->upc_ean_isbn }}</td> --}}
                <td>
                <img src="{{$avatar}}" alt="" height="30">    
                {{ $value->item_name }}</td>
                <td>{{ !empty ($value->category) ? $value->category->name : '' }}</td>
                <td class="hidden-xs">{{ $value->qty }}</td>
                <td class="hidden-xs">{{ $value->cost_price }}</td>
                <td>{{ $value->selling_price }}</td>
                <td class="">
                    <label class="switch">
                      <input type="checkbox" name="type" submit-toggle="#changeType{{$value->id}}"
                      {{!empty($value) && $value->type == 1 ? 'checked' : ''}}>
                      <span class="slider round"></span>
                    </label>
                    <form action="{{route('items.update', $value->id)}}" method="POST"  id="changeType{{$value->id}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name='action' value="update-type"/>
                      <input  type="hidden" name="type" value="{{ $value->type == 1 ? 0 : 1}}" />
                    </form>
                  </td>
                {{-- <td class="hidden-xs"><img src="{{$avatar}}" alt="" height="30"></td> --}}
                <td class="item_btn_group">
                    @php
                    $actions = [
                    ['data-replace'=>'#inventory','url'=>'#inventoryModal','ajax-url'=>url('inventory/'. $value->id .'/edit'), 'name'=>trans('item.inventory'), 'icon'=>'list'],
                    ['data-replace'=>'#item_attribute','url'=>'#itemAttributeModal','ajax-url'=>url('itemattribute?item_id='. $value->id), 'name'=>trans('item.Variants'), 'icon'=>'book'],
                    ['data-replace'=>'#editItem','url'=>'#editItemModal','ajax-url'=>url('items/'.$value->id. '/edit'), 'name'=>trans('item.edit'), 'icon'=>'pencil'],
                    ['url'=>'items/'. $value->id, 'name'=>'delete']];
                    @endphp
                    @include('partials.actions', ['actions'=>$actions])
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$items, 'index_route'=>route('items.index')])
  </div>
<!-- /.box-body -->