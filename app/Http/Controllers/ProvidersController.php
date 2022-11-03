<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Provider;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProvidersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providers = Provider::all();

        return view('providers.index', compact('tasks'));
    }

    public function create()
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('providers.create');
    }

    public function store(StoreProviderRequest $request)
    {
        Provider::create($request->validated());

        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('tasks.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('providers.edit', compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

        return redirect()->route('providers.index');
    }

    public function destroy(Provider $provider)
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $provider->delete();

        return redirect()->route('providers.index');
    }
}
