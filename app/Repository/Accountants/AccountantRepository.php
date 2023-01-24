<?php

namespace App\Repository\Accountants;
use App\Models\Accountant;
use App\Models\Gender;
use App\Models\Wilaya;
use App\Models\Day;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AccountantRequest;


class AccountantRepository implements AccountantRepositoryInterface{

    public function GetAccountants()
    {
        $accountants = Accountant::all();
        return view('pages.accountants.index',compact('accountants'));
    }

    public function CreateAccountants()
    {
        $data['genders'] = Gender::all();
        $data['wilayas'] = Wilaya::all();
        $data['days'] = Day::all();
        return view('pages.accountants.create',$data);
    }

    public function StoreAccountants(AccountantRequest $request)
    {


        DB::beginTransaction();

        try {
            $accountants = new Accountant();
            $accountants->name = ['en' => $request->name_en, 'ar' => $request->name];
            $accountants->email = $request->email;
            $accountants->password = Hash::make($request->password);
            $accountants->gender_id = $request->gender_id;
            $accountants->wilaya_id = $request->wilaya_id;
            $accountants->date_birth = $request->date_birth;
            $accountants->joining_date = $request->joining_date;
            $accountants->address = $request->address;
            $accountants->phone = $request->phone;
            $accountants->description = $request->description;
            $accountants->status = $request->status;
            $accountants->save();
            $accountants->days()->attach($request->days);


            DB::commit();
            return redirect()->route('accountants.index');

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowAccountants($id)
    {
        $accountants = Accountant::findorfail($id);
        return view('pages.accountants.show', compact('accountants'));
    }

    public function EditAccountants($id)
    {
        $data['genders'] = Gender::all();
        $data['wilayas'] = Wilaya::all();
        $data['days'] = Day::all();
        $accountants =  Accountant::findOrFail($id);
        return view('pages.accountants.edit',$data, compact('accountants'));
    }

    public function UpdateAccountants(AccountantRequest $request)
    {
        try{
            $accountants = Accountant::findorfail($request->id);
            $accountants->name = ['en' => $request->name_en, 'ar' => $request->name];
            $accountants->email = $request->email;
            $accountants->password = Hash::make($request->password);
            $accountants->gender_id = $request->gender_id;
            $accountants->wilaya_id = $request->wilaya_id;
            $accountants->date_birth = $request->date_birth;
            $accountants->joining_date = $request->joining_date;
            $accountants->address = $request->address;
            $accountants->phone = $request->phone;
            $accountants->description = $request->description;
            $accountants->status = $request->status;
            $accountants->days()->sync($request->days);
            $accountants->save();
            return redirect()->route('accountants.index');
        }

        catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteAccountants($request)
    {

        try {
            Accountant::destroy($request->id);
            return redirect()->route('accountants.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
