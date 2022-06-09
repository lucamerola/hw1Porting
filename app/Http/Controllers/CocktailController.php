<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CocktailController extends BaseController{


    public function openingCocktail(){
        $url="https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail";
        $json = Http::get($url);
        if ($json->failed()) abort(500);

        $list_drinks_API = json_decode($json, 1);
        $list_drinks_API=$list_drinks_API['drinks'];
        $my_drinks_List=array();
        if(Session::get('user_id')){
            #Se c'è una sessione attiva
            #prendo i cocktail a cui l'utente ha messo il like
            $likes_drink = Likes::where('id', Session::get('user_id') );
            #creo una lista che dovrà contenere gli id dei cocktail
            #a cui l'utente ha messo il like
            $drinks_code=array();
            foreach($likes_drink as $drinkLiked){
                #inserisco questi valori nella lista
                $drinks_code[]=$drinkLiked;
            }
            for($i=0;$i<12;$i++){
                $maxJ=count($drinks_code);
                for($j=0;$j<$maxJ;$j++){
                    if($drinks_code[$j]==$list_drinks_API[$i]['idDrink']){
                        $list_drinks_API[$i]['like']=true;
                    }
                }
            }
            
        }
        for($i=0;$i<12;$i++){
            array_push($my_drinks_List, $list_drinks_API[$i]);
        }
    
        return response()->json($my_drinks_List);
    }
}