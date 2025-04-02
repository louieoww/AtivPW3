<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::All();
        return view ('products.index', compact('products'));
        
    }

    public function create()
    {
        return view ('products.create');
    }

    public function store(Request $request)
    {
          $request->validate([
            'aquarium_model' => 'required|string|max:255',
            'size' => 'required|numeric',
            'water_capacity' => 'required|numeric',
        ],
        [
            'aquarium_model.required' => 'Insira um modelo de aquário.',
            'size.required' => 'Insira um tamanho.',
            'water_capacity.required' => 'Insira a capacidade de água.',
        ]);



        $product=new Product();
        $product->aquarium_model=$request->input('aquarium_type');
        $product->size=$request->input('size');
        $product->water_capacity=$request->input('water_capacity');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Aquário registrado.');
    
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('products'));
    }

    public function update(Request $request, string $id)
    {
     
        $request->validate([
            'aquarium_model' => 'required|string|max:200',
            'size' => 'required|string',
            'water_capacity' => 'required|numeric',
        ]);

        $product=new Product();
        $product->aquarium_model=$request->input('aquarium_type');
        $product->size=$request->input('size');
        $product->water_capacity=$request->input('water_capacity');
        $product->save();

        return redirect()->route('product.index')->with('success', 'Aquário atualizado adicionado!');
    }

    public function destroy($id)
        {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Aquário excluído!');
        }
}