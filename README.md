# Cách tạo project Laravel by me

### ADMIN

1.Tạo project laravel
```
composer create-project --prefer-dist laravel/laravel shopbhlaravel
```
2.Thiet lap modules

{https://github.com/nWidart/laravel-modules}

```
composer require nwidart/laravel-modules
```

3.Them "Modules\\": "Modules/" vao composer.json

4.Chay composer dump-autoload

5.Tao ten modules

https://nwidart.com/laravel-modules/v6/introduction

```
php artisan module:make Admin
```

6.Thay đổi layout, copy file, thay đổi đường dẫn

7.Tạo controller trong Modules

```
php artisan module:make-controller {ten controller } {trong thư mục Admin}
php artisan module:make-controller AdminCategoryController Admin
```

Viết hàm 
```
public function index()
    {
        return view('admin::category.index');
    }
    public function create(){
    	return view ('admin::category.create');
    }
    public function store(){
        return view('admin::category.index');
    }
```

8.Tạo Route
```
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');

    Route::group(['prefix' => 'category'],function(){
    	Route::get('/','AdminCategoryController@index') -> name('admin.get.list.category');
    	Route::get('/create','AdminCategoryController@create') -> name('admin.get.create.category');
    	Route::post('/create','AdminCategoryController@store');

    });
});
```

9.Tạo request bắt lỗi thông tin
```
php artisan make:request RequestCategory
```
```
public function rules()
    {
        return [
            'name' => 'required',
            'icon' => 'required'

        ];

    }
    public function messages(){
        return [
            'name.required' => 'Trường này không được để trống',
            'icon.required' => 'Trường này không được để trống',
        ];
}
```
10.name="name" value="{{old('name')}}"

11.Tạo cơ sở dữ liệu

```
php artisan make:migration {tên bảng}
php artisan make:migration create_categories_table
```

Tạo các thuộc tính tương ứng

Tài liệu
https://viblo.asia/p/tim-hieu-eloquent-trong-laravel-phan-1-eloquent-model-database-QpmleBAo5rd

https://viblo.asia/p/eloquent-trong-laravel-53-GrLZDbBO5k0

https://viblo.asia/p/migration-trong-laravel-va-nhung-dieu-can-biet-ByEZkyEy5Q0


12.Fixed lỗi 

```
pp\Providers\AppServiceProvider
use Illuminate\Support\Facades\Schema;
public function boot()
{
    Schema::defaultStringLength(191);
}
```

13.Thay đổi tên database, username
Add migration 

Nếu đã tồn tại bảng, muốn xóa đi:
php artisan migrate:rollback
Vào database xóa bảng.

```
php artisan migrate
```

14.Tạo model Category

```
Php artisan make:model Models/Category
protected $table = 'categories';
protected $guarded = [''];
```

15.Lấy giá trị form

```
public function store(RequestCategory $requestCategory){
        dd($requestCategory->all());
        $category = new Category();
        $category->c_name = $requestCategory->name;
        $category->c_slug = str_slug($requestCategory->name);
        $catetory->c_icon = str_slug($requestCategory->name);

        $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo: $requestCategory->name;
        $category->c_desciption_seo = $requestCategory->c_desciption_seo ? $requestCategory->c_desciption_seo: $requestCategory->name;
        $category->save();

        return redirect()->back();
}
```

16.Chạy composer require laravel/helpers nếu lỗi slug

17.Collection trong Laravel

https://phambinh.net/bai-viet/collection-trong-laravel-rat-manh-me/

18.Truy vấn database

https://allaravel.com/blog/xay-dung-truy-van-bang-laravel-query-builder

19.Thêm sửa xóa
```
public function edit($id){
        $category = Category::find($id);
        
        return view('admin::category.update',compact('category'));
    }
    public function update(RequestCategory $requestCategory,$id){
        $category = Category::find($id);
        $category->c_name = $requestCategory->name;
        $category->c_icon =  $requestCategory->icon;
        $category->c_slug =  str_slug($requestCategory->name);
        $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo: $requestCategory->name;
        $category->c_desciption_seo = $requestCategory->c_desciption_seo ? $requestCategory->c_desciption_seo: $requestCategory->name;
        $category->save();

        return redirect()->back();
}

```

20. https://www.softwaretestinghelp.com/laravel-forms-and-validation/

21. Mô tả editor, ckfinder

https://namcoi.com/cai-dat-ckeditor-4-va-ckfinder-3-trong-du-an-php-framework-laravel-5/

22. https://github.com/Crinsane/LaravelShoppingcart

23. https://packagist.org/packages/hardevine/shoppingcart

24. Shopping cart

25. Seed

```
Php artisan make:seed UserTableSeeder
php artisan db:seed --class=UserTableSeeder

php artisan migrate:refresh
php artisan make:middleware Otp

php artisan make:policy UserPolicy --model=User
```
