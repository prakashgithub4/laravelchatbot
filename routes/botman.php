<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('._(Hi|Hello)._', BotManController::class.'@startConversation');