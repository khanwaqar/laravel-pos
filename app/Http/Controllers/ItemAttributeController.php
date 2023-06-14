<?php

namespace App\Http\Controllers;

use App\ItemAttribute;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemAttributeController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $item_id = request()->item_id;
        $data['item'] = (new Item())->getById($item_id);
        $data['attributes'] = (new ItemAttribute())->getAll($item_id);
        $data['attribute'] = '';
        return $this->commonResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validator($input)->validate();
        $items = (new Item())->getById($input['item_id']);
        $item_atributes = new ItemAttribute;
        $item_atributes->item_id = $input['item_id'];
        $item_atributes->name = $input['name'];
        $item_atributes->exp_date = $input['exp_date'];
        $item_atributes->quantity = $input['quantity'];
        $item_atributes->upc_ean_isbn = $input['upc_ean_isbn'];
        $item_atributes->cost_price = $input['cost_price'];
        $item_atributes->status =  !empty($input['status']) ? $input['status'] : 0;
        $item_atributes->selling_price = $input['selling_price'];


        if (!empty($request->file('image'))) {
            $avatarName = $this->uploadImage($request->file('image'), "images/items/attribute");
            $input['image'] = $avatarName;
        }
        $item_atributes->image = !empty($input['image']) ? $input['image'] : "no-foto.png";
        $item_atributes->save();

        $data['item'] = $items;
        $data['attributes'] = (new ItemAttribute())->getAll($items->id);
        $data['attribute'] = '';
        return $this->commonResponse($data, __('You have successfully added item Attribute'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_id = request()->item_id;
        $data['item'] = (new Item())->getById($item_id);
        $data['attributes'] = (new ItemAttribute())->getAll($item_id);
        $data['attribute'] = (new ItemAttribute())->getById($id);
        return $this->commonResponse($data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if (!empty($input['title'])) {
            $this->validator($input)->validate();
        }
        $item_attribute =  (new ItemAttribute())->getById($id);
        if (!empty($request->file('image'))) {
            $avatarName = $this->uploadImage($request->file('image'), "images/items/attribute");
            $input['image'] = $avatarName;
        }
        $data['item'] = (new Item())->getById($item_attribute->item_id);
        if(empty($input['status'])){
            $input['status'] = 0;
        }else{
            $input['status'] = 1;
        }
        $item_attribute->saveData($input, $id);

        //get all item attributes where item_id = item_id
        $data['attributes'] = (new ItemAttribute())->getAll($item_attribute->item_id);
        $data['attribute'] = '';
        return $this->commonResponse($data, __('You have successfully updated attribute'));

        
        // process inventory
        $inventories = new Inventory;
        $input['attribute_id'] = $id;
        $input['user_id'] = Auth::user()->id;
        $input['quantity'] = $input['quantity'] - $item_attribute->quantity;
        $input['remarks'] = "Manual Edit of Quantity";
        $inventories->saveInventory($input);
        $data['item'] = $item_attribute;
    }

    public function destroy($id)
    {
        try {
            $itemattribute = (new ItemAttribute())->getById($id);
            $data['item'] = Item::where('id', $itemattribute->item_id)->first();
            $data['attributes'] = ItemAttribute::where('item_id', $itemattribute->item_id)->get();
            $data['attribute'] = '';
            return $this->commonResponse($data, ['danger' => __("Variant can't deleted, you can disable or edit it")]);
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->commonResponse([], ['danger' => __('Integrity constraint violation: You Cannot delete a parent row')]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:150',
            'image' => 'mimes:jpeg,bmp,png|max:5120kb',
            'upc_ean_isbn' => 'required|max:90',
            'quantity' => 'required|numeric|max:9999999',
            'cost_price' => 'required|numeric|max:9999999',
            'selling_price' => 'required|numeric|max:9999999',
        ]);
    }


    private function commonResponse($data = [], $notify = null)
    {
        $response = $this->processNotification($notify);
        $response['replaceWith']['#item_attribute'] = view('item.attributeform', $data)->render();
        return $this->sendResponse($response);
    }
}
