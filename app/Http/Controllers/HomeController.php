<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function playCard()
    {

        $number_of_player = request('player');
        $range = range(1, $number_of_player);

        $card_deck = self::cards();
        $total_cards = count($card_deck);
        shuffle($card_deck);
        
        $card_per_person = floor($total_cards / $number_of_player);
        $card_per_person = ($card_per_person < 1) ? 1 : intval($card_per_person);

        $each_player_result = [];
      
        foreach ($range as $player)
        {
            $card_set = [];
            for ($i=1; $i <= $card_per_person; $i++){
                
                if (count($card_deck) > 0) {                  
                    $pick = array_shift($card_deck);

                    if ($pick)
                    {
                        array_push($card_set, $pick);
                       
                    }
                }

            }

            array_push($each_player_result, ['player' => $player, 'cards' => $card_set]);
        }

        return response()->json([
            'status' => true,
            'result' => $each_player_result
        ]);
    }

    static function cards()
    {
        $card_type = [
            'club' => 'C',
            'heart' => 'H',
            'diamond' => 'D',
            'spade' => 'S'
        ];

        $num = [
            1 => 'A',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
            7 => '7',
            8 => '8',
            9 => '9',
            10 => 'X',
            11 => 'J',
            12 => 'Q',
            13 => 'K',
        ];

        $card_listing = [];

        foreach ($card_type as $key => $type)
        {
            foreach ($num as $number)
            {
                $card_listing[] = $type . '-' . $number;
            }
        }

        return $card_listing;
    }
}
