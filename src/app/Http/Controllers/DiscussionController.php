<?php

namespace App\Http\Controllers;

use App\Core\Assemblers\Discussions\DiscussionAssemblerInterface;
use App\Core\Services\DiscussionServiceInterface;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index(DiscussionServiceInterface $service){
        $dto =$service->getAllDiscusions();
        return view('discussions.index',['dto'=>$dto]);
    }

    public function show(Discussion $discussion,DiscussionAssemblerInterface $assembler) {
        $discussion->see = $discussion->see+1;
        $discussion->save();
        $dto = $assembler->assemble($discussion);
        return view('discussions.show',['discussion'=>$dto]);
    }

    public function filter(Request $request, DiscussionServiceInterface $service){
        $dto = $service->filterDiscussions($request->all());
        return view('discussions.index',['dto'=>$dto]);
    }

    public function search(Request $request, DiscussionServiceInterface $service){
        $query = $request->get('query');
        $dto = $service->searchDiscussions($query);
        return view('discussions.index',['dto'=>$dto,'query'=>$query]);
    }
}
