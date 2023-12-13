<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function mainAdmin()
    {
        $messages = Message::where('receiver_id', 1)->get();
        $userNames = [];

        foreach ($messages as $message) {
            $user = User::where('id', $message->user_id)->first();
            if (!in_array($user->NAME, $userNames)) {
                $userNames[] = $user->NAME;
            }
        }
        $movementController = new MovementController();
        $lastMovements = $movementController->showLastMovements();

        $accountController=new AccountController();
        $lastAccounts = $accountController->lastCreatedAccounts();

        $userController=new UserController();
        $lastsUsers = $userController->lastUsers();

        return view('mainAdmin', compact('userNames','lastMovements','lastAccounts','lastsUsers'));
    }

    public function getChatMessages(Request $request)
    {

        $userName = $request->input('inputUsername');


        $user_id = User::where('NAME', $userName)->first()->id;

        $messages = Message::where('user_id', $user_id)->get();

        return view('adminChat', compact('messages'));
    }
}
