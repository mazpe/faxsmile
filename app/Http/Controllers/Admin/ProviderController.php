<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $this->authorize('index', Provider::class);

        return view('admin.provider.index',[
            'providers' => Provider::withCount('faxes')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Provider::class);

        return view('admin.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Provider::class);

        $this->validate($request, [
            'name' => 'required|unique:entities,name,NULL,id,deleted_at,NULL'
        ]);

        Provider::create($request->all());

        return redirect()->route('provider.index')
            ->with('success','Provider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $provider= Provider::find($id);

        $this->authorize('view', $provider);

        $provider_faxes = $provider->faxes;
        $provider_users = $provider->users;

        return view('admin.provider.show',
            compact('provider','provider_faxes','provider_users')
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
        $provider = Provider::find($id);

        $this->authorize('update', $provider);

        return view('admin.provider.edit',compact('provider'));
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
        $provider = Provider::find($id);

        $this->authorize('update', $provider);

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $provider->update($request->all());

        return redirect()->route('provider.index')
            ->with('success','Provider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $provider = Provider::find($id);

        $this->authorize('delete', $provider);

        $provider->delete();

        return redirect()->route('provider.index')
            ->with('success','Provider deleted successfully');
    }

}
