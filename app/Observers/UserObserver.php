<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /*
     когда в системе админ регистрирует нового пользователя, то в телеграмм-канал приходит уведомление.
     отправка сообщений в телеграмм-канал 'https://t.me/+8dueBjCdnWg4MDcy'
    */

    public function created(User $user)
    {
        $idChannel = env('TELEGRAMM_ID_CHANNEL');
        $botToken = env('TELEGRAMM_BOT_TOKEN');
        $message = 'В системе зарегистрирован пользователь ' . $user->lastname . ' ' . $user->name ;
        try {
            file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
        }
        catch (\Exception $e){
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
