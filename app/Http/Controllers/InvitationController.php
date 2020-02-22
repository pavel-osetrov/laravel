<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * Description of InvitationController
 *
 * @author oWX775118
 */
class InvitationController 
{
    public function __invoke($invitation, $answer, Request $request) 
    {
        //  проверка, если в маршрутах отсутствует >middleware('signed');
        if (! $request->hasValidSignature()) {
            abort(403);
        }
    }
}
