<?php

namespace App\Http\Controllers\Ticket;

use App\Helpers\UserManager;
use App\Http\Controllers\Controller;
use App\Mappers\Ticket;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Ticket
 */
class IndexController extends Controller
{
    /**
     * @param $ticketId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke($ticketId, Request $request)
    {
        $user = UserManager::getUser();
        $ticket = Ticket::find($ticketId);
        $data = [
            'user' => $user,
            'ticket' => $ticket,
        ];
        return view('ticket', $data);
    }
}
