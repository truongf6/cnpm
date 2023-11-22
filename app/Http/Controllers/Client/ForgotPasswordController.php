<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailForgotPassword;

class ForgotPasswordController extends Controller
{
    public function index() {
        return view('client.forgotPassword.index');
    }

    public function sendMail(Request $request) {
        $email = $request->post('email');
        $user = User::query()->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('client.forgotPassword.index')
                    ->with('msg', 'Không tồn tại tài khoản.')
                    ->with('type', 'error');
        }

        generateToken:
        $token = Str::random(55) . rand(0, 9999);
        if (ForgotPassword::where('token', $token)->exists()) {
            goto generateToken;
        }

        ForgotPassword::create([
            'userid' => $user->id,
            'token' => $token,
        ]);

        $data = [
            'subject' => 'Đặt lại mật khẩu',
            'url' => route('client.forgotPassword.resetPassword', ['token' => $token]),
        ];
        try {
            Mail::to($email)->send(new MailForgotPassword($data));

            return redirect()->route('client.forgotPassword.index')
            ->with('msg', 'Quên mật khẩu thành công. Vui lòng kiểm tra email.')
            ->with('type', 'success');

        } catch(\Exception $e) {
            return redirect()->route('client.forgotPassword.index')
            ->with('msg', 'Có lỗi xảy ra, vui lòng thử lại sau.')
            ->with('type', 'error');
        }
    }

    public function resetPassword(Request $request) {
        $token = $request->token;
        $userForgotPassword = ForgotPassword::query()->where('token', $token)->first();
        if (!$userForgotPassword) {
            return redirect()->route('client.home.index');
        }

        return view('client.forgotPassword.resetPassword', [
            'userForgotPassword' => $userForgotPassword
        ]);
    }

    public function handleResetPassword(Request $request) {
        $token = $request->post('token');
        $userid = $request->post('userid');
        $password = $request->post('password');

        $userForgotPassword = ForgotPassword::query()->where('token', $token)->first();
        if ($userForgotPassword->userid != $userid) {
            return redirect()->route('client.home.index');
        }

        User::where('id', $userid)->update(['password' => md5($password)]);

        ForgotPassword::where('token', $token)->delete();

        return redirect()->route('client.login.index')
                ->with('msg', 'Đổi mật khẩu thành công.')
                ->with('type', 'success');
    }
}
