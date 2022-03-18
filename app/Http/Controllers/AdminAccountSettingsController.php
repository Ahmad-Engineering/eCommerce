<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminInfo;
use App\Models\AdminSocial;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminAccountSettingsController extends Controller
{
    //
    public function showChangePassword () {
        return response()->view('ecommerce.admin.settings.change-password');
    }

    public function changePassword (Request $request) {
        $validator = Validator($request->all(), [
            'old_password' => 'required|string|min:8|max:50',
            'new_password' => 'required|string|min:8|max:50',
            're_new_password' => 'required|string|min:8|max:50',
        ]);
        //
        if (!$validator->fails()) {
            if ($request->get('new_password') == $request->get('re_new_password')) {
                if (Hash::check($request->get('old_password'), auth('admin')->user()->password)) {
                    $admin = auth('admin')->user();
                    $admin->password = Hash::make($request->get('new_password'));
                    $isUpdated = $admin->save();

                    return response()->json([
                        'message' => $isUpdated ? 'Password changed successfully' : 'Faild to change password',
                    ], $isUpdated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                }else {
                    return response()->json([
                        'message' => 'Wrong current password.',
                    ], Response::HTTP_BAD_REQUEST);
                }
            }else {
                return response()->json([
                    'message' => 'Password dose\'t matches.',
                ], Response::HTTP_BAD_REQUEST);
            }
        }else {
            return response()->json([
                'message' => $validator->getMessageBag()->first(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function showAdminAccountSettings () {
        $admin = auth('admin')->user();
        $admin_info = AdminInfo::where([
            ['admin_id', auth('admin')->user()->id],
        ])->first();
        $admin_social = AdminSocial::where([
            ['admin_id', auth('admin')->user()->id],
        ])->first();
        return response()->view('ecommerce.admin.settings.account-settings', [
            'admin' => $admin,
            'admin_info' => $admin_info,
            'admin_social' => $admin_social, 
        ]);
    }
}
