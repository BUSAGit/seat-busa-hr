<?php

namespace Helious\SeatBusaHr\Http\Controllers\Character;

use Seat\Web\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Seat\Web\Http\DataTables\Scopes\CharacterScope;

use Seat\Eveapi\Models\Character\CharacterInfo;

class HrController extends Controller
{
    /**
     * Show the eligibility checker.
     *
     * @return \Illuminate\Http\Response
     */
     public function notes(CharacterInfo $character, Request $request)
    {

        return view('seat-busa-hr::eligibility.notes', compact('character'));
    }


}
