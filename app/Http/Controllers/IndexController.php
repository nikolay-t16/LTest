<?php

namespace App\Http\Controllers;

use App\Helpers\UserManager;
use App\Mappers\Ticket;
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
        if($user->is_admin) {
            $tickets = Ticket::all();
        } else {
            $tickets = $user->tickets;
        }
        $data = [
            'user' => $user,
            'tickets' => $tickets,
        ];
        return view('welcome', $data);
    }
}
