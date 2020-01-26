<?php

namespace App\Http\Controllers;

use App\Helpers\UserManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function __invoke(Request $request)
    {
        $user = UserManager::getUser();
        $data = [
            'user' => $user,
        ];
        return view('welcome', $data);
    }
}
