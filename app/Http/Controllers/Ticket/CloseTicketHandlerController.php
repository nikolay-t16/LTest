<?php


namespace App\Http\Controllers\Ticket;


use App\Http\Controllers\Controller;
use App\Mappers\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CloseTicketHandlerController extends Controller
{
    /**
     * @param $ticketId
     * @param $userId
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function __invoke($ticketId, $userId, Request $request)
    {
        Ticket::query()
            ->where([Ticket::FIELD_ID => $ticketId])
            ->limit(1)
            ->update(
                [
                    Ticket::FIELD_OPEN => 0,
                ]
            );

        return redirect('/ticket/'.$ticketId.'?user='.$userId);
    }
}
