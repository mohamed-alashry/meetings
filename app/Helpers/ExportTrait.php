<?php

namespace App\Helpers;


use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Exports\DataExport;
use App\Exports\InvoicesExport;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\Lang;
use Maatwebsite\Excel\Facades\Excel;


trait ExportTrait
{

    public function exportData($export_rows, $forable)
    {
        $className = 'App\Models\\' . Str::studly(Str::singular($forable));

        if(class_exists($className)) {
            $model = new $className;

            $data['rows'] = $model->select($model->exports??'*')->whereIn('id', $export_rows)->get();
            $data['heading'] = $this->dataHeading($forable, $model->exports??$model->fillable);
        }

        $export = new DataExport($data);

        return Excel::download($export, ucfirst($forable).'.xlsx');
    }

    public function dataHeading($forable, $columns)
    {
        $res = [];

        foreach($columns as $col){
            $res[] = Lang::get('models/'. $forable .'.fields.'. $col);
        }

        return $res;
    }

    public function export_users($export_rows)
    {
        $users = User::whereIn('id', $export_rows['export_rows'])->with('subCategory')->get();

        $export = new UsersExport($users);

        return Excel::download($export, 'Users.xlsx');
    }

    public function export_product($export_rows)
    {
        $users = Product::whereIn('id', $export_rows['export_rows'])->with('items')->get();

        $export = new ProductsExport($users);

        return Excel::download($export, 'Products.xlsx');
    }
    public function export_invoices($export_rows)
    {
        $invoice = Order::whereIn('id', $export_rows['export_rows'])->with('products')->get();

        $export = new InvoicesExport($invoice);

        return Excel::download($export, 'Invoices.xlsx');
    }


}
