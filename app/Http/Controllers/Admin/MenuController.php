<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Category::withCount('menus')->get();
    $menus = Menu::with(['category'])->get()
      ->sortBy(fn($item) => strtolower($item->category->name));

    return view('admin.menu.index', [
      'categories' => $categories,
      'menus' => $menus,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();

    return view('admin.menu.create', [
      'categories' => $categories,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedInput = $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:menus,name'],
      'price' => ['required'],
      'description' => ['required', 'string', 'max:255'],
      'category' => ['required'],
      'photo' => ['required', 'file', 'max:2048']
    ]);

    //Insert image menu
    $photoPath = $request->file('photo')->storePubliclyAs(
      'menu/photos',
      str($validatedInput['name'])->kebab() . '.' . $request->file('photo')->getClientOriginalExtension(),
      'public',
    );

    $menuCreated = Menu::create([
      'name' => $validatedInput['name'],
      'price' => (int)$validatedInput['price'],
      'description' => $validatedInput['description'],
      // 'is_special' => $validatedInput['is_special'],
      'category_id' => $validatedInput['category'],
      'photo_path' => $photoPath,
    ]);

    return to_route('admin.menu.index')->with([
      'status' => "success",
      'message' => "Menu $menuCreated->name berhasil ditambahkan"
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Menu $menu
   * @return \Illuminate\Http\Response
   */
  public function show(Menu $menu)
  {
    $menu->load('category');
    return view('admin.menu.show', [
      'menu' => $menu,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Menu $menu
   * @return \Illuminate\Http\Response
   */
  public function edit(Menu $menu)
  {
    $categories = Category::all();

    return view('admin.menu.edit', [
      'menu' => $menu,
      'categories' => $categories,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Menu $menu
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Menu $menu)
  {
    $rules = [
      'name' => ['required', 'string', 'max:255'],
      'price' => ['required'],
      'description' => ['required', 'string', 'max:255'],
      'category' => ['required'],
      'photo' => ['sometimes', 'file', 'max:1024']
    ];

    if ($request['name'] !== $menu->name) {
      $rules['name'][] = 'unique:menus,name';
    }

    $validatedInput = $request->validate($rules);

    //update image menu
    if (isset($validatedInput['photo'])) {
      tap($request->file('photo'), function ($previous) use ($menu, $validatedInput) {
        $menu->forceFill([
          'photo_path' => $validatedInput['photo']->storePubliclyAs(
            'menu/photos',
            str($validatedInput['name'])->kebab() . '.' . $validatedInput['photo']->getClientOriginalExtension(),
            'public',
          ),
        ])->save();

        if ($previous) {
          Storage::disk('public')->delete($previous);
        }
      });
    }

    $menu->update([
      'name' => $validatedInput['name'],
      'price' => (int)$validatedInput['price'],
      'description' => $validatedInput['description'],
      // 'is_special' => $validatedInput['is_special'],
      'category_id' => $validatedInput['category'],
    ]);

    return to_route('admin.menu.index')->with([
      'status' => "success",
      'message' => "Menu {$menu['name']} berhasil diperbaharui"
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Menu $menu
   * @return \Illuminate\Http\Response
   */
  public function destroy(Menu $menu)
  {
    if (is_file_exists($menu->photo_path)) {
      Storage::delete($menu->photo_path);
    }

    $result = $menu->delete();

    return to_route('admin.menu.index')->with([
      'status' => $result ? 'success' : 'danger',
      'message' => $result ? "Menu $menu->name berhasil dihapus" : "Menu $menu->name gagal dihapus",
    ]);
  }
}
