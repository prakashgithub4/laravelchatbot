<?php
namespace App\Http\Controllers;
  
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
  
class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
  
            if ($message == 'hi') {
                $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
                    $name = $answer->getText();
          
                    $this->say('Nice to meet you '.$name);
                    $this->say('What is your email?'.$name);
                });
            
            }else if($message =='email'){
               $botman->reply('Thanks you for share your email');

            }else{
                $botman->reply("Sorry We can't under stand your comment please specify that");
            }
  
        });
  
        $botman->listen();
    }
  
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
        });
    }
}