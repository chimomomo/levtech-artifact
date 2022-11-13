<?php

namespace App\Http\Controllers;

use App\Recruit;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RecruitRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RecruitController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Recruit::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $recruit = $query->with('game', 'user')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('recruits/index')->with(['recruits' => $recruit, 'keyword' => $keyword]); 
    }
    
    public function show(Recruit $recruit)
    {
        return view('recruits/show')->with(['recruit' => $recruit]);  
    }
    
    public function create(Game $game)
    {
        return view('/recruits/create')->with(['games' => $game->get()]);
    }
    
    public function store(RecruitRequest $request, Recruit $recruit)
    {
        $input = $request['recruit'];
        $recruit->fill($input)->save();
        
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $recruit->image_name = $upload->getSecurePath();
            $recruit->image_id = $upload->getPublicId();
            $recruit->save();
        }
        
        return redirect('/recruits/' . $recruit->id);
    }
    
    public function edit(Recruit $recruit, Game $game)
    {
        return view('recruits/edit')->with(['recruit' => $recruit, 'games' => $game->get()]);
    }
    
    public function update(RecruitRequest $request, Recruit $recruit)
    {
        $input_recruit = $request['recruit'];
        $recruit->fill($input_recruit)->save();
        
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $recruit->image_name = $upload->getSecurePath();
            $recruit->image_id = $upload->getPublicId();
            $recruit->save();
        }else{
            $recruit->image_name = NULL;
            $recruit->image_id = NULL;
            $recruit->save();
        }
        
        return redirect('/recruits/' . $recruit->id);
    }
    
    public function delete(Recruit $recruit)
    {
        $recruit->delete();
        return redirect('/');
    }  
}
