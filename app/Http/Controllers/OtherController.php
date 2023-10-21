<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OtherController extends Controller
{
    public function index()
    {
        return view('other');
    }
    public function bored()
    {
        $response = Http::get('https://www.boredapi.com/api/activity');
        $activity = $response->json();

        return view('other', ['activity' => $activity['activity']]);
    }

    public function national()
    {
        $name = request('name');
        $response = Http::get("https://api.nationalize.io/?name=$name");
        $data = $response->json();

        return view('other', ['name' => $name, 'predictions' => $data['country']]);
    }

    public function ipify()
    {
        $response = Http::get('https://api.ipify.org?format=json');
        $ip = $response->json();
        $user = Auth::user();

        return view('office.index', ['ip' => $ip['ip'], 'user' => $user]);
    }
    public function ipinfo()
    {
        $ip = request('ip');

        // Проверка на действительный IP-адрес
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $response = Http::get("http://ipinfo.io/$ip/geo");
            $data = $response->json();
        } else {
            // Если IP-адрес недействительный, вернуть ошибку
            return view('other', ['error' => 'Недействительный IP-адрес']);
        }

        return view('other', ['ipInfo' => $data]);
    }
}
