<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.pages.pages.index', [
            'pages' => Page::getPages()
        ]);
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pageStatus(Request $request)
    {
        Page::toggleStatus($request->id, $request->mode);
        return response()->json(['msg' => 'Status updated successfully.', 'status' => true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuList = Menu::where('status', 'active')->get();
        return view('administrator.pages.pages.create', compact('menuList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);

        $data = Page::create([
            'name'          =>  $request->name,
            'slug'          =>  Str::slug($request->name),
            'content'       =>  $request->content,
            'status'        =>  $request->status,
            'controller'    => 'PageController',
            'type'          => 'custom',

        ]);

        return $data
            ? redirect()->route('pages.index')->with('success', 'Page Successfully Created')
            : back()->with('error', 'Error Creating Page!, Try again later');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $menuList = Menu::where('status', 'active')->get();
        return $page
            ? view('administrator.pages.pages.edit', compact('page', 'menuList'))
            : back()->with('error', 'Data not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if ($page) {

            $request->validate([
                'name' => 'required',
                'content' => 'required',
            ]);

            $data = $request->all();

            return $page->fill($data)->save()
                ? redirect()->route('pages.index')->with('success', 'Page Successfully Updated')
                : back()->with('error', 'Error Updating Page!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if ($page) {
            return $page->delete()
                ? back()->with('success', 'Page deleted successfully')
                : back()->with('error', 'Error Deleting Page!, Try again later');
        } else {
            return back()->with('error', 'Date not found');
        }
    }
}
