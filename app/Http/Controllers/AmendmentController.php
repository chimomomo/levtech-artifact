<?php

namespace App\Http\Controllers;

use App\Amendment;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class AmendmentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Amendment::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $amendment = $query->with('game', 'user')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('amendments/index')->with(['amendments' => $amendment, 'keyword' => $keyword]);
    }
    
    public function show(Amendment $amendment)
    {
        return view('amendments/show')->with(['amendment' => $amendment]);  
    }
    
    public function create(Game $game)
    {
        return view('/amendments/create')->with(['games' => $game->get()]);
    }
    
    public function store(AmendmentRequest $request, Amendment $amendment)
    {
        $input = $request['amendment'];
        $amendment->fill($input)->save();
        
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $amendment->image_name = $upload->getSecurePath();
            $amendment->image_id = $upload->getPublicId();
            $amendment->save();
        }
        
        return redirect('/amendments/' . $amendment->id);
    }
    
    public function edit(Amendment $amendment, Game $game)
    {
        return view('amendments/edit')->with(['amendment' => $amendment, 'games' => $game->get()]);
    }
    
    public function update(AmendmentRequest $request, Amendment $amendment)
    {
        $input_amendment = $request['amendment'];
        $amendment->fill($input_amendment)->save();
        
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $amendment->image_name = $upload->getSecurePath();
            $amendment->image_id = $upload->getPublicId();
            $amendment->save();
        }else{
            $amendment->image_name = NULL;
            $amendment->image_id = NULL;
            $amendment->save();
        }
        
        return redirect('/amendments/' . $amendment->id);
    }
    
    public function delete(Amendment $amendment)
    {
        $amendment->delete();
        return redirect('/');
    }  
}
