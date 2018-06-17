<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\CreateEmployeeForm;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Catergory;
use App\Product;
use App\Event;
use App\Bill;
use App\Blog;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    //product
    public function catergoryadmin()
    {
        $this->authorize('view-product');
        $page = 2;
        $catergory = Catergory::all();
        $product = Product::paginate($page);
        $count = Product::count();
        return view('admin.maintable', compact('catergory', 'product', 'count', 'page'));
    }

    //event
    public function event()
    {
        $this->authorize('view-event');
        $page = 2;
        $event = Event::paginate($page);
        $count = Event::count();
        return view('admin.event.event', compact('event', 'count', 'page'));
    }
    //bill
    public function showbill()
    {
        $this->authorize('view-bill');
        $page = 2;
        $bill = Bill::paginate($page);
        $count = Bill::count();
        return view('admin.bill.managebill', compact('bill', 'count', 'page'));
    }

    //blog
    public function showblog()
    {
        $this->authorize('view-blog');
        $page = 4;
        $posts = Blog::paginate($page);
        $count = Blog::count();
        return view('admin.blog.manageblog', compact('posts','page', 'count'));
    }

    public function employee()
    {
        $this->authorize('view-employee');
        $page = 4;
        $roles = Role::all();
        $admin = Admin::paginate($page);
        $count = Admin::count();
        return view('admin.employee.employee', compact('admin', 'roles', 'page', 'count'));
    }

    public function them(CreateEmployeeForm $form)
    {
        $form->add();
        session()->flash('message', 'Thêm thành công!');
        return redirect()->back();
    }

    public function role()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role.role', compact('roles', 'permissions'));
    }

    public function permission($id)
    {
        $permission = Role::find($id)->permissions()->get();
        //dd($permission);
        return response()->json($permission);
    }

    public function updatepermissions($roleid){
        Role::find($roleid)->permissions()->sync(request('data'));
    }

    public function createrole()
    {
        Role::create([
          'title' => request('title')
        ]);
        session()->flash('message', 'Thêm thành công');
        return redirect()->back();
    }

    public function createpermission()
    {
        Permission::create([
           'title' => request('title1'),
           'name' => request('name')
        ]);
        session()->flash('message', 'Thêm thành công');
        return redirect()->back();
    }

    public function getinfo($rid){
        $edit = Admin::find($rid);
        $roles = Role::all();
        return view('admin.employee.editemployee', compact('edit', 'roles'));
    }

    public function edit($id)
    {
        $edit = Admin::find($id);
        $edit->name = request()->input('name1');
        $edit->nickname = request()->input('nickname1');
        $edit->telephone = request()->input('telephone1');
        $edit->role_id = request()->get('role_id1');
        $edit->save();
        session()->flash('message', 'Sửa thành công!');
        return redirect()->back();
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        session()->flash('message', 'Xóa thành công!');
        return redirect()->back();
    }

    public function customer()
    {
        $page = 4;
        $user = User::paginate($page);
        $count = User::count();
        return view('admin.customer.customermain', compact('user', 'page', 'count'));
    }

    public function customerbill($rid)
    {
        $order = Bill::where('user_id', $rid)->get();
        return view('admin.customer.customerbill', compact('order'));

    }

    public function customersearch()
    {
        $page = 4;
        $q = request('search');
        $user = User::where('name', 'like', '%' . $q . '%')->orWhere('email', 'like', '%' . $q . '%')->paginate($page);
        $user->appends(['search' => $q]);
        $count = $user->count();
        return view('/admin.customer.customersearch', compact('user', 'count', 'page'));
    }

}
