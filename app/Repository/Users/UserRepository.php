<?php

namespace App\Repository\Users;

use App\Models\User;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface{

    use AttachFilesTrait;

    public function GetUsers()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }


    public function StoreUsers($request)
    {
        DB::beginTransaction();


        try {
            $users = new User();
            $users->name = $request->name;
            $users->users_images =  $request->file('users_images')->getClientOriginalName();
            $users->email = $request->email;
            $users->password = Hash::make($request->password);
            $users->save();
            $this->uploadFile($request,'users_images','users_images');

            DB::commit();
            return redirect()->route('users.index');

        }
        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }



    public function ShowUsers($id)
    {
        $users = User::findorfail($id);
        return view('pages.users.show', compact('users'));
    }

    public function UpdateUsers($request)
    {
        try{
            $users = User::findorfail($request->id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request->password);

            if($request->hasfile('users_images')){
                $this->deleteFile($users->users_images);
                $this->uploadFile($request,'users_images','users_images');
                $users_images_new = $request->file('users_images')->getClientOriginalName();
                $users->users_images = $users->users_images !== $users_images_new ? $users_images_new : $users->users_images;
            }
            $users->save();

            return redirect()->route('users.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteUsers($request)
    {
        try {
            $this->deleteFile($request->users_images);
            User::destroy($request->id);
            return redirect()->route('users.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/users_images/'.$name);
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/users_images/'.$name);
        }
    }
}
