<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // Tìm kiếm người dùng trong cơ sở dữ liệu bằng email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Kiểm tra mật khẩu của người dùng
            if (Hash::check($request->password, $user->password)) {
                // Đăng nhập thành công
                Auth::login($user);
                return redirect()->intended('dashboard')->withSuccess('Xin chào ' . $user->name);
            }
        }

        // Nếu không đăng nhập thành công, chuyển hướng lại trang đăng nhập với thông báo lỗi
        return redirect("login")->withSuccess('Thông tin đăng nhập không hợp lệ');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
