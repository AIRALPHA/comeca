<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $id = auth('api')->user()->id;
        $user = User::with('Profile', 'Orders', 'Products')->get()->find($id);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = auth('api')->user();
        $name = "";

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);

        if($request->profile["avatar"] != $user->profile->avatar) {
            $name = time() . '.' . explode('/',
                    explode(':',
                        substr($request->profile["avatar"], 0,
                            strpos($request->profile["avatar"], ';')))[1])[1];
            $name = "uploads/profile/" . $name;
            Image::make($request->profile["avatar"])->save(public_path($name));

            /*$request->merge(['user.profile.avatar' => $name]);*/

            // Efface l'ancien photo
            $userPhoto = public_path($user->profile->avatar);
            $contains = Str::contains($userPhoto, "avatar");
            if(file_exists($userPhoto) && !$contains) {
                @unlink($userPhoto);
            }

        }

        if(!empty($request->password)) {
            $request->merge(["password" => Hash::make($request->password)]);
        }

        $data =  $request->profile;
        unset($data['avatar']);

        $user->update($request->all());
        $user->profile()->update($data);
        if (!empty($name))
            $user->profile->avatar = $name;

        $user->save();
        $user->profile->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
