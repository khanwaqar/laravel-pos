<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'type', 'description'];

    public function expense()
    {
        return $this->hasMany('App\Expense');
    }

    public function getAll()
    {
        $expense_cat_array = [];
        $expense_cats = ExpenseCategory::all();
        if (!empty($expense_cats)) {
            foreach ($expense_cats as $value) {
                $expense_cat_array[$value->id] = $value;
            }
        }
        return $expense_cat_array;
    }
    use HasFactory;
}
