<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuList = Menu::get();
        $url = URL::to('/') . '/';
        return view('administrator.pages.menu.index', compact('menuList', 'url'));
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function menuStatus(Request $request)
    {
        Menu::toggleStatus($request->id, $request->mode);
        return response()->json(['msg' => 'Status updated successfully.', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_menus = Menu::get();
        return view('administrator.pages.menu.create', compact('parent_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'string|required',
            'parent_id'     => 'nullable|exists:menus,id',
            'sort_order'    => 'nullable',
            'status'        => 'nullable|in:active,inactive',
        ]);

        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $data['slug'] = $slug;

        if ($request->parent_id === null) {
            $data['parent_id'] = 0;
        }

        return Menu::create($data)
            ? redirect()->route('menus.index')->with('success', 'Menu Successfully Created')
            : back()->with('error', 'Error Creating Menu!, Try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $parent_menus = Menu::get();
        return $menu
            ? view('administrator.pages.menu.edit', compact('menu', 'parent_menus'))
            : back()->with('error', 'Data not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        if ($menu) {
            $this->validate($request, [
                'title'         => 'string|required',
                'parent_id'     => 'nullable|exists:menus,id',
                'sort_order'    => 'nullable',
                'status'        => 'nullable|in:active,inactive',
            ]);

            $data = $request->all();
            $slug = Str::slug($request->input('title'));
            $data['slug'] = $slug;

            if ($request->parent_id === null) {
                $data['parent_id'] = 0;
            }

            return $menu->fill($data)->save()
                ? redirect()->route('menus.index')->with('success', 'Menu Successfully Updated')
                : back()->with('error', 'Error Updating Menu!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu) {
            return $menu->delete()
                ? back()->with('success', 'Menu deleted successfully')
                : back()->with('error', 'Error Deleting Menu!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
