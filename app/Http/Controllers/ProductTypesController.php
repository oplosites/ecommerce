<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ProductTypes;

class ProductTypesController extends Controller
{
    private $controller = 'ProductTypesController';
    private $viewDir = 'types';

    public function index()
    {
        $data = ProductTypes::paginate(10);

        return view('admin/commons/list', [
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'detailMethod' => $this->controller . '@index',
            'editMethod' => $this->controller . '@edit',
            'dataHeader' => [
                'title' => 'title',
                'description' => 'Description',
            ]
        ]);
    }

    public function create()
    {
        return view('admin/' . $this->viewDir . '/form', [
            'data' => new ProductTypes(),
        ]);
    }

    public function store(Request $request)
    {
        $data = ProductTypes::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_by' => 'DUMMY',
        ]);

        return redirect('/admin/' . $this->viewDir . '/' . $data->id)
            ->with('success', 'The ' . $this->viewDir . ' has been successfully created');
    }

    public function show($id)
    {
        $data = ProductTypes::find($id);

        return view('admin/' . $this->viewDir . '/detail', [
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        return view('admin/' . $this->viewDir . '/form', [
            'data' => ProductTypes::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ProductTypes::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect('/admin/' . $this->viewDir . '/' . $data->id)
            ->with('success', 'The ' . $this->viewDir . ' has been successfully updated');
    }

    public function destroy(Request $request)
    {
        $data = ProductTypes::find($request->input('item-id'))->delete();

        return redirect('/admin/' . $this->viewDir . '')
            ->with('success', 'The ' . $this->viewDir . ' has been successfully deleted');
    }
}
