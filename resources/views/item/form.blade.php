@if(!empty($item))
<div class="modal-content" id="editItem">
        {{ Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT', 'files' => true)) }}
@else
<div class="modal-content" id="addItem">
    {{ Form::open(['url' => 'items', 'files' => true]) }}
@endif
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">@if(!empty($item)) {{__('Edit Item')}} @else {{__('Add Item')}}@endif</h4>
    </div>
    <div class="modal-body" >
        <div class="row">
            <div class="col-sm-6">

                @include('item.add_category_btn')

                <div class="form-group row">
                {{ Form::label('upc_ean_isbn', __('SKU').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('upc_ean_isbn',null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                {{ Form::label('item_name', trans('item.item_name').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                    {{ Form::text('item_name', null, ['class' => 'form-control','required']) }}
                    </div>
                </div>

                <div class="form-group row">
                {{ Form::label('size', trans('item.size'), ['class'=>'col-sm-3 text-right']) }}
                <div class="col-sm-9"> 
                {{ Form::text('size', null, ['class' => 'form-control']) }}
                </div>
                </div>

                <div class="form-group row">
                {{ Form::label('description', trans('item.description'), ['class'=>'col-sm-3 text-right']) }}
                <div class="col-sm-9"> 
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows'=>4]) }}
                </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('status', trans('item.status'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        <label class="switch">
                          <input type="checkbox" name="type" id="type" value="1" {{ !empty($item) && $item->type == 1 ? 'checked' : ''}}>
                          <span class="slider round"></span>
                        </label>
                        {{-- <input type="hidden" name="hidden_status" id="hidden_status" value="active"> --}}
                    </div>
                          {{-- <input  type="hidden" name="status" value="" /> --}}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                        {{ Form::label('hasVariant', trans('item.HasVariant'), ['class'=>'col-sm-3 text-right']) }}
                        <div class="col-sm-9">  
                        @if(!empty($item) && $item->attributes->count() > 0)
                            <input type="checkbox" id="hasVariant" name="hasVariant" value="hasVarient" onclick="hideField()" checked disabled>
                        @else
                            <input type="checkbox" id="hasVariant" name="hasVariant" value="hasVarient" onclick="hideField()">
                        @endif
                        </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('cost_price', trans('item.cost_price').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('cost_price', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('selling_price', __('Sell Price').' *', ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::text('selling_price', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                @if(!empty($item) && $item->attributes->count() > 0)
                
                @else
                <div class="form-group row" id="quantity">
                    {{ Form::label('quantity', trans('item.quantity'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::number('quantity', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @endif

                <div class="form-group row">
                    {{ Form::label('stock_limit', __('Stock Limit'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::number('stock_limit', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                

                @if(!empty($item) && $item->attributes->count() > 0)
                @else
                <div class="form-group row" id="exp_date">
                    {{ Form::label('expire_date', __('Expire Date'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9"> 
                    {{ Form::date('expire_date', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    {{ Form::label('avatar', __('Avatar'), ['class'=>'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::file('avatar', null, ['class' => 'form-control']) }}
                        @if(!empty($item))
                        <img src="{{$item->fileUrl()}}" alt="" height="35">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        {{ Form::submit(trans('item.submit'), ['class' => 'btn btn-success']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
    </div>    
    {{ Form::close() }}
</div>