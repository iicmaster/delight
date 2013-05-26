<?php

class Seed_Users extends \S2\Seed 
{
    public function grow()
    {
        $user = new User;
        $user->name = 'โอ๊ค Admin1';
        $user->username = 'admin1';
        $user->password = Hash::make('1234');
        $user->email = 'okara@delight.com';
        $user->address = 'Bangsue, Bangkok';
        $user->tel = '0894568959';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'แอน Admin2';
        $user->username = 'admin2';
        $user->password = Hash::make('1234');
        $user->email = 'anniza@delight,com';
        $user->address = 'Bangkae, Bangkok';
        $user->tel = '0835689958';
        $user->role = 'admin';
        $user->save();

        $user = new User;
        $user->name = 'กวิน';
        $user->username = 'kawin';
        $user->password = Hash::make('1234');
        $user->email = 'kawin99@delihgt.com';
        $user->address = 'Bangsue, Bangkok';
        $user->tel = '0856949586';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'เจมส์';
        $user->username = 'jame';
        $user->password = Hash::make('1234');
        $user->email = 'jame01@hotmail.com';
        $user->address = 'Onnuch, Bangkok';
        $user->tel = '0859968899';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'แทยอน';
        $user->username = 'taeyeon';
        $user->password = Hash::make('1234');
        $user->email = 'taeyeon09@girls-generation.net';
        $user->address = 'Rachaprasong, Bangkok';
        $user->tel = '0859989999';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'เจสสิก้า';
        $user->username = 'jessica';
        $user->password = Hash::make('1234');
        $user->email = 'jessica09@girls-generation.net';
        $user->address = 'Rachaprasong, Bangkok';
        $user->tel = '0899959995';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'ยุนอา';
        $user->username = 'yoona';
        $user->password = Hash::make('1234');
        $user->email = 'yoona09@girls-generation.net';
        $user->address = 'Rachaprasong, Bangkok';
        $user->tel = '0899988899';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'ยูริ';
        $user->username = 'yuri';
        $user->password = Hash::make('1234');
        $user->email = 'yuri09@girls-generation.net';
        $user->address = 'Rachaprasong, Bangkok';
        $user->tel = '0899988855';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'อ็อฟ';
        $user->username = 'aof';
        $user->password = Hash::make('1234');
        $user->email = 'aof_05@hotmail.com';
        $user->address = 'Bangkae, Bangkok';
        $user->tel = '0856489758';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'แนน';
        $user->username = 'nan';
        $user->password = Hash::make('1234');
        $user->email = 'nan_99@gmail.com';
        $user->address = 'Dindang, Bangkok';
        $user->tel = '0825498658';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'นุ่น';
        $user->username = 'nun';
        $user->password = Hash::make('1234');
        $user->email = 'nun_55@gmail.com';
        $user->address = 'Rachada, Bangkok';
        $user->tel = '0811548858';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'เกม';
        $user->username = 'game';
        $user->password = Hash::make('1234');
        $user->email = 'gamer_mama@gmail.com';
        $user->address = 'Silom, Bangkok';
        $user->tel = '0813455855';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'เจน';
        $user->username = 'jane';
        $user->password = Hash::make('1234');
        $user->email = 'jane012@gmail.com';
        $user->address = 'Bangrak, Bangkok';
        $user->tel = '0813455855';
        $user->role = 'user';
        $user->save();

        $user = new User;
        $user->name = 'โอคาระ';
        $user->username = 'Okara';
        $user->password = Hash::make('suankularb');
        $user->email = 'Okara_Os@delight.com';
        $user->address = 'Bangsue, Bangkok';
        $user->tel = '0818222250';
        $user->role = 'user';
        $user->save();
    }
    
    public function order()
    {
        return 100;
    }
}