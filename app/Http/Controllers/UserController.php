<?php

namespace App\Http\Controllers;

use App\Mail\UserWelcomeEmail;
use App\Models\City;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('city')->withCount('permissions')->get();
        return response()->view('cms.users.index', ['users' => $users]);
    }

    public function editUserPermissions(Request $request, User $user)
    {
        $permissions = Permission::where('guard_name', '=', 'user')->get();
        $userPermissions = $user->permissions;
        foreach ($permissions as $permission) {
            $permission->setAttribute('assigned', false);
            foreach ($userPermissions as $userPermission) {
                if ($permission->id == $userPermission->id) {
                    $permission->setAttribute('assigned', true);
                }
            }
        }

        return response()->view('cms.users.user-permissions', ['permissions' => $permissions, 'user' => $user]);
    }


    public function updateUserPermissions(Request $request, User $user)
    {
        $validator = Validator($request->all(), [
            'permission_id' => 'required|numeric|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            //SELECT * FROM permissions where guard_name = 'user' AND id = 1;
            $permission = Permission::findOrFail($request->input('permission_id'));
            if ($user->hasPermissionTo($permission)) {
                $user->revokePermissionTo($permission);
            } else {
                $user->givePermissionTo($permission);
            }
            return response()->json(['message' => 'Permission updated successfully'], Response::HTTP_OK);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::where('active','=',true)->get();
        return response()->view('cms.users.create',['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(),[
            'name' => 'required|string|min:3',
            'email_address' => 'required|email|unique:users,email',
            'city_id' => 'required|numeric|exists:cities,id',
        ]);

        if(! $validator->fails()){
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email_address');
            $user->city_id = $request->input('city_id');
            $user->password = Hash::make('123456');

            $isSaved = $user->save();
            if($isSaved){
                Mail::to($user)->send(new UserWelcomeEmail($user));
            }
            return response()->json([
                'message' => $isSaved ? 'Saved Successfully' : 'Save failed!'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else{
            return response()->json(['message', $validator->getMessageBag()->first()],
            Response::HTTP_BAD_REQUEST
        // );

        
      
        );
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $cities = City::where('active','=',true)->get();
        return response()->view('cms.users.edit',['user'=>$user,'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string|min:3',
            'email_address' => 'required|email|unique:users,email,'.$user->id,
            'city_id' => 'required|numeric|exists:cities,id'

        ]);
        if(! $validator->fails()){
            $user->name = $request->input('name');
        $user->email = $request->input('email_address');
        $user->city_id = $request->input('city_id');
        $isSaved = $user->save();
        return response()->json(
            ['message'=>$isSaved ? 'Updated Successfuly' : 'Update failed!'],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }else {
            return response()->json(['message'=>$validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $deleted = $user->delete();
        return response()->json(
            [
               'title' => $deleted ? 'Deleted!' : 'Delete Failed!',
               'text'=> $deleted ? 'User delete successfuly' : 'User seleting failed!',
               'icon'=> $deleted ? 'success' : 'error'
            
            ],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
    );
    }
}
