<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Mappers\Ticket;
use App\Mappers\TicketMsg;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AddHandler
 * @package App\Http\Controllers\Ticket
 */
class AddHandlerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Factory|View
     */
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request)
    {
        $userId = $request->get('user');
        $name = $request->get('name');
        $text = $request->get('text');
        $ticketId = Ticket::insertGetId(
            [
                Ticket::FIELD_USER_ID => $userId,
                Ticket::FIELD_NAME => $name,
            ]
        );
        TicketMsg::insert(
            [
                TicketMsg::FIELD_USER_ID => $userId,
                TicketMsg::FIELD_TICKET_ID => $ticketId,
                TicketMsg::FIELD_TEXT => $text,
            ]
        );

        return redirect('/ticket/'.$ticketId.'/?user='.$userId);
    }
}
