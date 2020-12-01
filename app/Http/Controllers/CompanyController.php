<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(5);
        return view('company.index',compact('company'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:40',
            'email'  => 'required|string|email|max:255|unique:users',
            'website' => 'required|string|max:40',
            'logo' => 'required|mimes:png|dimensions:min_width=100,min_height=100|max:2042',
        ]);
        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                $extension = $request->logo->extension();
                $request->logo->storeAs('/public/company/', $validated['nama'].".".$extension);
                $url = Storage::url("public/company/".$validated['nama'].".".$extension);
                Company::create([
                    'nama' => $validated['nama'],
                    'email' => $validated['email'],                   
                    'website' => $validated['website'],                   
                    'logo' => $url,
                ]);
                return redirect('/company')->with('status','Data Berhasil Di Tambahkan');
              
            }
            else{
                return 'fail';
            }
        }
        else{
            return 'fail';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company.detail',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.update' ,compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        if ($request->file('logo')) {
            $validated = $request->validate([
                'nama' => 'required|string|max:40',
                'email'  => 'required|string|email|max:255|unique:users',
                'website' => 'required|string|max:40',
                'logo' => 'required|mimes:png|dimensions:min_width=100,min_height=100|max:2042',
            ]);
            $extension = $request->logo->extension();
            $date = Carbon::now();
            $request->logo->storeAs('/company/', $validated['nama'].".".$extension);
            $url = Storage::url("company/".$validated['nama'].".".$extension);
            Company::where('id',$company->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,                   
                'website' => $request->website,                
                'logo' => $url,
                'updated_at' =>Carbon::now(),
            ]);
            return redirect('/company')->with('status','Data Berhasil Di Update');
        }
        else {
            
            Company::where('id',$company->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,                   
                'website' => $request->website,   
                'logo' => $company->logo,    
                'updated_at' =>Carbon::now(),
            ]);
            return redirect('/company')->with('status','Data Product Berhasil Di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('/company')->with('status','Delete Succes');
    }
}
