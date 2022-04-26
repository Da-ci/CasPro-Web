<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotif(Request $request){
        $notifications = Notification::where('user_id', '=', $request->user_id, 'AND')->whereNull('read')->limit(5)->get();

        return $notifications;

    }

    public function markAsRead(Request $request){

        $notification = Notification::find($request->id);

        $notification->update([
            'read' => 1
        ]);

    }

    public function markAllCommandeAsRead(Request $request){

        $notifications = Notification::where('user_id', '=', $request->user_id, 'AND')->where('type', '=', 'Nouvelle Commande' );

        $notifications->update([
            'read' => 1
        ]);
    }

    public function createNotifCommercial(Request $request){
        Notification::create([
            'type' => 'Demande Payement',
            'data' => null,
            'user_id' => $request->user_id,
            'commande_id' => null,
        ]);
    }


    public function getNotifAdmin(){

        $notifications = Notification::where('type', '=', 'Demande Payement', 'AND')->whereNull('read')->limit(5)->get();

        return $notifications;
    }
}
