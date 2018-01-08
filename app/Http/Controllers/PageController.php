<?php
namespace App\Http\Controllers;

use App\Model\Page;
use Illuminate\Http\Request;
use App\Service\TextService;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all()->sortBy('path');
        return view('pages.index', compact('pages'));
    }

    public function show($path)
    {
        $page = Page::where('path', 'like' ,$path)->firstOrFail();
        $sub_pages = Page::where('path', 'like', $path . '/%')->orderBy('path')->get();
        return view('pages.show', compact('page', 'sub_pages'));
    }

    public function edit($path)
    {
        $page = Page::where('path', 'like' ,$path)->firstOrFail();
        $page->text = (new TextService())->convertToWiki($page->text);

        return view('pages.edit', compact('page'));
    }

    public function update($path, Request $request)
    {
      	$request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);
      
        $page = Page::where('path', 'like' ,$path)->firstOrFail();
        $page->name = $request->name;
        $page->text = (new TextService())->convertToHTML($request->text);
        $page->save();

        return redirect()->route('show', compact('path'));
    }

    public function add($path = null)
    {
        return view('pages.add', compact('path'));
    }

    public function create($path = null, Request $request)
    {
      	$request->validate([
            'code' => 'required|regex:/^[0-9A-Za-z_]+$/|unique:pages|max:255',
            'name' => 'required',
            'text' => 'required',
        ]);

        $parent = null;
        if($path){
            $parent = Page::where('path', 'like' ,$path)->first();
        }

        $page = new Page();
        $page->code = $request->code;
        $page->name = $request->name;
        $page->text = (new TextService())->convertToHTML($request->text);
        $page->level = $parent ? $parent->level + 1 : 1;
        $page->path = ($parent ? $parent->path . '/' : '') . $page->code;

        $page->save();

        return redirect()->route('show', ['path' => $page->path]);
    }
}