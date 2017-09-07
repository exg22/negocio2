<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Client;
use Illuminate\Http\Request;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 0;

        if (!empty($keyword)) {
            $client = Client::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('apellido', 'LIKE', "%$keyword%")
				->orWhere('documento', 'LIKE', "%$keyword%")
				->orWhere('cuit', 'LIKE', "%$keyword%")
				->orWhere('telefono', 'LIKE', "%$keyword%")
				->orWhere('correo', 'LIKE', "%$keyword%")
				->orWhere('direccion', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $client = Client::paginate($perPage);
        }

        return view('client.client.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('client.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'nombre' => 'min:3|required',
			'apellido' => 'min:3|required',
			'documento' => 'min:8|required|numeric',
			'telefono' => 'required',
			'correo' => 'email|required',
			'cuit' => 'required'
		]);
        $requestData = $request->all();
        
        Client::create($requestData);

        Session::flash('flash_message', 'Client added!');

        return redirect('client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);

        return view('client.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('client.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'nombre' => 'min:3|required',
			'apellido' => 'min:3|required',
			'documento' => 'min:8|required|numeric',
			'telefono' => 'required',
			'correo' => 'email|required',
			'cuit' => 'required'
		]);
        $requestData = $request->all();
        
        $client = Client::findOrFail($id);
        $client->update($requestData);

        Session::flash('flash_message', 'Client updated!');

        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Client::destroy($id);

        Session::flash('flash_message', 'Client deleted!');

        return redirect('client');
    }
}
