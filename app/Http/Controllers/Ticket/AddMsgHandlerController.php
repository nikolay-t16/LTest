<?php


namespace App\Http\Controllers\Ticket;


use App\Http\Controllers\Controller;
use App\Mappers\TicketMsg;
use Illuminate\Http\Request;

class AddMsgHandlerController  extends Controller
{
    public function __invoke(Request $request)
    {
        $userId = $request->get('user');
        $ticketId = $request->get('ticket');
        $text = $request->get('text');
        TicketMsg::insert(
            [
                TicketMsg::FIELD_USER_ID => $userId,
                TicketMsg::FIELD_TICKET_ID => $ticketId,
                TicketMsg::FIELD_TEXT => $text,
            ]
        );
        return redirect('/ticket/'.$ticketId.'?user='.$userId);
    }
}
