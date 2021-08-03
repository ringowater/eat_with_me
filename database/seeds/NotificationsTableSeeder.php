<?php

use App\Notification;
use Illuminate\Database\Seeder;
use User;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $user_ids = User::orderBy('id')->pluck('id');

    for($i = 0 ; $i < 25 ; $i++) {

        $notification = new Notification();
        $notification->title = 'テストタイトル - '. $i;
        $notification->description = "テストお知らせ\nテストお知らせ\nテストお知らせ - ". $i;
        $notification->save();

        foreach ($user_ids as $user_id) {

            $read = new NotificationRead();
            $read->user_id = $user_id;
            $read->notification_id = $notification->id;
            $read->save();

        }

    }
}
}
