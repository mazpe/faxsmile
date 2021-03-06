<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('index', Company::class);

        return view('admin.company.index',[
            'companies' => Company::withCount('clients')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Company::class);

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Company::class);

        $this->validate($request, [
            'name' => 'required|unique:entities,name,NULL,id,deleted_at,NULL'
        ]);

        Company::create($request->all());

        return redirect()->route('company.index')
            ->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $company= Company::with('setting')->find($id);

        $this->authorize('view', $company);

        $company_clients = $company->clients;
        $company_admin = $company->users;

        $company_users = $company_admin->merge($company->clientUsers);

        return view('admin.company.show',
            compact('company','company_users')
        );
    }

    /**
     * Display the specified resource to be edited.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $company = Company::find($id);

        $this->authorize('update', $company);

        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        $this->authorize('update', $company);

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $company->update($request->all());

        return redirect()->route('company.show', ['company_id' => $company->id])
            ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        $this->authorize('delete', $company);

        $company->delete();

        return redirect()->route('company.index')
            ->with('success','Company deleted successfully');
    }
}
