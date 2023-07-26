<?php

namespace Helious\SeatEligibility\Http\Controllers\Character;

use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Eveapi\Models\Assets\CharacterAsset;

use Seat\Eveapi\Models\Killmails\KillmailAttacker;
use Seat\Eveapi\Models\Killmails\KillmailVictim;
use Seat\Eveapi\Models\Killmails\KillmailDetail;
use Seat\Eveapi\Models\Killmails\Killmail;

use Seat\Eveapi\Models\Character\CharacterSkill;
use Seat\Web\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Seat\Web\Http\DataTables\Scopes\CharacterScope;

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
