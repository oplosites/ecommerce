<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Categories;

class CategoriesController extends Controller
{
    private $controller = 'CategoriesController';
    private $viewDir = 'categories';

    public function index()
    {
        $data = Categories::paginate(10);

        return view('admin/commons/list', [
            'data' => $data,
            'isCreateButtonEnable' => true,
            'mainController' => $this->controller,
            'detailMethod' => 'CategoriesController@index',
            'editMethod' => 'CategoriesController@edit',
            'dataHeader' => [
                'title' => 'title',
                'description' => 'Description',
            ]
        ]);
    }

    public function create()
    {
        // Get product categories to be show as parent options
        $productCategories = [
            0 => 'No Parent'
        ];

        foreach (Categories::all() as $key => $value) {
            $productCategories[$value->id] = $value->title;
        };

        return view('admin/' . $this->viewDir . '/form', [
            'data' => new Categories(),
            'productCategories' => $productCategories,
        ]);
    }

    /**
     * Store new data to the database
     */
    public function store(Request $request)
    {
        // Get parent category input
        $parentInput = $request->input('parent');

        // Default category to be input to the database
        $categoryInputable = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'created_by' => 'DUMMY',
        ];

        // When user chose a parent
        if ($parentInput != 0) {
            $categoryInputable['parent_id'] = $parentInput;
        }

        // Save new category to database
        $data = Categories::create($categoryInputable);

        return redirect("/admin/$this->viewDir/$data->id")
            ->with('success', "The $this->viewDir has been successfully created");
    }

    public function show($id)
    {
        $data = Categories::find($id);

        return view('admin/' . $this->viewDir . '/detail', [
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        return view('admin/' . $this->viewDir . '/form', [
            'data' => Categories::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Categories::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'updated_by' => 'DUMMY',
        ]);

        return redirect('/admin/' . $this->viewDir . '/' . $data->id)
            ->with('success', 'The ' . $this->viewDir . ' has been successfully updated');
    }

    public function destroy(Request $request)
    {
        $data = Categories::find($request->input('item-id'))->delete();

        return redirect('/admin/categories')
            ->with('success', 'The ' . $this->viewDir . ' has been successfully deleted');
    }
}
