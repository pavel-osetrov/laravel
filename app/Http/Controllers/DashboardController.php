<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Применение middleware в контроллерах
 *
 * @author posetrov
 */
class DashboardController  extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
        $this->middleware('admin-auth')
                ->only('editUsers');
        
        $this->middleware('team-member')
                ->except('editUsers');
    }
}
