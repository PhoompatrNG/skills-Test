<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Models\Folder;
use App\Models\File;
use App\Models\Customer;
use App\Models\User;
use PDF;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        }

        // Authentication failed...
        return redirect()->route('login.form')->with('error', 'Invalid username or password')->withInput();
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function home()
    {
        $Customer = Customer::all(); // เรียกข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        $data = [
            'Customer' => $Customer,
        ];

        return view('Home', $data); // ส่งข้อมูลผู้ใช้ไปยัง Blade Template
    }
    public function add(Request $request)
    {
        $path = $request->path();
        if ($path ) {
            $lastSegment = last(explode('/', $path));
        }
        $Customer = Customer::where('CustomerID',$lastSegment)->first();
        $data = [
            'Customer' => $Customer,
            'lastSegment' => $lastSegment,
        ];
        return view('add', $data); // ส่งข้อมูลผู้ใช้ไปยัง Blade Template
    }
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'prefix' => 'required',
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'address' => 'required|string',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'customer_size' => 'required|in:S,M,B',
            'customer_grade' => 'required|in:A,B,C',
        ]);
        // dd($request->CustomerID);

        $Customer = Customer::where('CustomerID', $request->CustomerID)->first();

        if ($Customer) {
            // หากพบลูกค้าแล้ว, ทำการอัปเดตข้อมูล
            $Customer->IDCard = $request->idcard;
            $Customer->Prefix = $request->prefix;
            $Customer->FName = $request->f_name;
            $Customer->LName = $request->l_name;
            $Customer->Address = $request->address;
            $Customer->Gender = $request->gender;
            $Customer->BirthDate = $request->birth_date;
            $Customer->CustomerSize = $request->customer_size;
            $Customer->CustomerGrade = $request->customer_grade;
            $Customer->UpdateBy = 'AD'; // อัปเดตโดย 'AD'

            $Customer->save(); // บันทึกการเปลี่ยนแปลง
        } else {
            // หากไม่พบลูกค้า, สร้างลูกค้าใหม่
            $customer = new Customer();
            $customer->CustomerID = (string) Str::uuid();
            $customer->IDCard = $request->idcard;
            $customer->Prefix = $request->prefix;
            $customer->FName = $request->f_name;
            $customer->LName = $request->l_name;
            $customer->Address = $request->address;
            $customer->Gender = $request->gender;
            $customer->BirthDate = $request->birth_date;
            $customer->CustomerSize = $request->customer_size;
            $customer->CustomerGrade = $request->customer_grade;
            $customer->CreateBy = 'AD'; // สร้างโดย 'AD'
            $customer->UpdateBy = 'AD'; // อัปเดตโดย 'AD'

            $customer->save(); // บันทึกลูกค้าใหม่
        }

        return redirect()->route('home')->with('success', 'Customer added successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::where('CustomerID', $id);
        $customer->delete();

        return redirect()->route('home')->with('success', 'Customer deleted successfully');
    }



}
