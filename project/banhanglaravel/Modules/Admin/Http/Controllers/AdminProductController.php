<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestProduct;
use App\Models\Models\Product;
use App\Models\Models\Category;
use DB;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $viewData['productList'] = DB::table('products')->join('categories','products.prod_cate','=','categories.c_id')->orderBy('p_id','desc')->get();
        return view('admin::product.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $viewData['cateList'] = Category::all();

        return view('admin::product.create',$viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RequestProduct $requestProduct){
        //dd($requestProduct->all());
        $this->insertOrUpdate($requestProduct);

        return redirect()->back();
    }
    public function edit($id){
        $viewData['product'] = Product::find($id);
        $viewData['listCate'] = Category::all();
        return view('admin::product.update',$viewData);
    }
    public function update(RequestProduct $requestProduct,$p_id){

        $this->insertOrUpdate($requestProduct,$p_id);

        return redirect('admin/product');
    }
    public function insertOrUpdate(RequestProduct $requestProduct,$p_id=''){
        $result =1;
        try {
            $product = new Product();
            if ($p_id){
                $product = Product::find($p_id);
            }
            $filename = $requestProduct->img->getClientOriginalName();
            $product->p_name = $requestProduct->p_name;
            $product->p_description =  $requestProduct->p_description;
            $product->p_slug =  str_slug($requestProduct->p_name);
            $product->p_price =  $requestProduct->p_price;
            $product->p_promotion =  $requestProduct->p_promotion;
            $product->p_status =  $requestProduct->p_status;
            $product->p_warranty = $requestProduct->p_warranty;
            $product->p_accessories = $requestProduct->p_accessories;
            $product->p_description = $requestProduct->p_description;
            $product->p_image =  $filename;
            $product->p_hot =  $requestProduct->p_hot ? 1 : 0;
            $product->p_active =  $requestProduct->p_active ? 1 : 0;
            $product->p_condition =  $requestProduct->p_condition;
            $product->prod_cate = $requestProduct->prod_cate;
            $requestProduct->img->storeAs('avatar',$filename);
            
            $product->save();
        } catch (Exception $e) {
            $result =0;
            Log::error("[Error insertUpdate product]".$e->getMessage());
        }
        return $result;
    }
    public function detroyX($id){
        product::find($id)->delete();
        return redirect()->back();
    }
    public function getCategories(){
        return Category::all();
    }
}
