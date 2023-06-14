<div class="" id="customerTable">
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{trans('customer.name')}}</th>
            <th>{{trans('customer.email')}}</th>
            <th class="hidden-xs">{{trans('customer.phone_number')}}</th>
            <th class="hidden-xs">{{trans('customer.avatar')}}</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $value)

    @php
    $avatar = asset('/dist/img/avatar5.png');
    if (trim($value->avatar) != 'no-foto.png') {
        $avatar = $value->fileUrl();
    }
    @endphp

        <tr>
          <td><a href="#showCustomerModal" data-replace-empty="#showCustomer" data-ajax-url="{{url('customers/' . $value->id . '/')}}" data-toggle="modal">{{ $value->name }}</a></td>
          <td>{{ $value->email }}</td>
          <td class="hidden-xs">{{ $value->phone_number }}</td>
          <td class="hidden-xs"><img src="{{$avatar}}" alt="" height="25"></td>
          <td class="item_btn_group">
          @php
            $actions = [
              ['data-replace'=>'#showCustomer','url'=>'#showCustomerModal','ajax-url'=>url('customers/' . $value->id . '/'), 'name'=>'View Profile', 'icon'=>'eye'],
              ['data-replace'=>'#editCustomer','url'=>'#editCustomerModal','ajax-url'=>url('customers/'.$value->id.'/edit'), 'name'=>trans('item.edit'), 'icon'=>'pencil'],
              ['url'=>'customers/' . $value->id,'name'=>'delete']];
            @endphp
            @include('partials.actions', ['actions'=>$actions])
          </td>
            
        </tr>
    @endforeach
    </tbody>
  </table>
  @include('partials.pagination', ['items'=>$customers, 'index_route'=>route('customers.index')])
</div>