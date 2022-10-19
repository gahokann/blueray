<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Lot;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('profile.index');
    }

    public function settings() {
        return view('profile.settings');
    }

    public function showLots()
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $countries = Country::all();
        $statuses = Status::all();

        $lots = Lot::where('user_id', Auth::user()->id)->get();

        return view('profile.lots', compact('genres', 'actors', 'countries', 'lots', 'statuses'));
    }

    public function changePassword() {
        $data = request()->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Проврека данных
        ]);

        if(!Hash::check($data['old_password'], auth()->user()->password)){ // Проверка пароля
            return back()->with("error", "Текущий пароль неверен!");
        }

        User::whereId(auth()->user()->id)->update([ // Обновление данных
            'password' => Hash::make($data['password'])
        ]);
        return back()->with("status", "Пароль успешно сменён!");
    }

    public function changeImage() {
        $data = request()->validate([
            'file' => ['required', 'image', 'dimensions:max_width=350px,max_height=350px'],
        ]);

        $imageName = time() . '.' . $data['file']->extension();

        $data['file']->move(public_path('img/imgUser/'), $imageName);

        $file = $imageName;


        if(Auth::user()->img != 'defaultimg.png') {
            unlink(public_path('img/imgUser' . '/' . Auth::user()->img));
        }


        User::where('id', Auth::user()->id)->update([
            'img' => $file,
        ]);

        return back()->with("status", "Иконка успешна сменёна!");

    }

    public function showOrder()
    {
        $orders = Order::where('client_id', Auth::user()->id)->get();

        return view('profile.order', compact('orders'));
    }
}
