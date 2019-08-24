<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\MenuItem;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('updated_at','desc')->orderBy('id','desc')->get();
        return view('admin.menus')->with(compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isEdit = false;
        return view('admin.menu')->with(compact('isEdit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->has('id')){
            // edit
            $menu = Menu::find($request->input('id'));
            $menu->update($data);
        }else{
            // create
            $menu = Menu::create($data);
        }
        // Update Items
        $menuItems = json_decode($data['menu_items_json']);
        if(isset($menuItems) && count($menuItems)){
            foreach ($menuItems as $key => $item) {
                if(isset($item->id) && $item->id > 0){
                    // edit
                    $menuItem = MenuItem::find($item->id);
                    $menuItem->update((array)$item);
                }else{
                    // create
                    $item->menu_id = $menu->id;
                    $menuItem = MenuItem::create((array)$item);
                }
            }
        }
        // Delete Items
        if($data['menu_items_destroy'] != ''){
            $destroyItems = explode(',',$data['menu_items_destroy']);
            foreach ($destroyItems as $key => $id) {
                MenuItem::find($id)->delete();
            }
        }
        return redirect('admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $isEdit = true;
        $menu = Menu::find($id);
        $menuItems = MenuItem::where('menu_id',$id)->orderBy('position')->get();
        return view('admin.menu')->with(compact('isEdit','menu','menuItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('admin/menus');
        //
    }
}
