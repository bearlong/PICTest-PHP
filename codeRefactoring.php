<?php
// 2. 請問以下程式寫法有何缺點，要如何重構 (Code refactoring)。(25%)
// class User
// {
//     private $light;
//     function __construct()
//     {
//         $this->light = new Light();
//     }
//     public function doing()
//     {
//         $this->light->turnOn();
//     }
// }

// class Light
// {
//     public function turnOn()
//     {
//         echo "turn on the light\n";
//     }
// }

// $user = new User();

// $user->doing();

// 定義裝置的行為
interface Device
{
    public function turnOn();
}

// Light 類別實現 Device 介面
class Light implements Device
{
    public function turnOn()
    {
        echo "Turn on the light\n";
    }
}

// User 類別可以不直接依賴 Light，而是依賴 Device 介面
class User
{
    private $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    public function doing()
    {
        $this->device->turnOn();
    }
}

$light = new Light();
$user = new User($light);
$user->doing();

//這樣可以用不同的裝置傳入User  增加了靈活性與擴展性
// ex:

class TV implements Device
{
    public function turnOn()
    {
        echo "Turn on the TV\n";
    }
}

$tv = new TV();

$user = new User($tv);

$user->doing();


//  回應為: Turn on the light Turn on the TV