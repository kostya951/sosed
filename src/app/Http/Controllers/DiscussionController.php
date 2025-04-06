<?php

namespace App\Http\Controllers;

use App\Core\Services\DiscussionServiceInterface;
use App\Models\Discussion;

class DiscussionController extends Controller
{
    public function index(DiscussionServiceInterface $service){
        $dto =$service->getAllDiscusions();
        return view('discussions.index',['dto'=>$dto]);
    }

    public function show(Discussion $discussion){
        return view('discussions.show');
    }
}
