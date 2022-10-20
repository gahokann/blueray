<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Lot;
use App\Models\LotActor;
use App\Models\LotCountry;
use App\Models\LotGenre;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lotCreate()
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'img' => ['required', 'image', 'dimensions:max_width=400px,max_height=500px'],
            'description' => ['required', 'string', 'max:600'],
            'age' => ['required', 'int', 'max:255'],
            'price' => ['required', 'int'],
            'date' => ['required', 'date'],
            'actors' => ['required'],
            'country' => ['required'],
            'genres' => ['required'],
            'status' => ['required'],
        ]);

        $imageName = time() . '.' . $data['img']->extension();

        $data['img']->move(public_path('img/img-lots/'), $imageName);

        $file = $imageName;

        $lot = Lot::create([
            'name' => $data['title'],
            'description' => $data['description'],
            'age' => $data['age'],
            'date' => $data['date'],
            'price' => $data['price'],
            'user_id' => Auth::user()->id,
            'img' => $file,
            'status_id' => $data['status'],
        ]);



        foreach($data['actors'] as $actors)
        {
            LotActor::create([
                'lot_id' => $lot->id,
                'actor_id' => $actors,
            ]);
        }

        foreach($data['genres'] as $genres)
        {
            LotGenre::create([
                'lot_id' => $lot->id,
                'genre_id' => $genres
            ]);
        }

        foreach($data['country'] as $country)
        {
            LotCountry::create([
                'lot_id' => $lot->id,
                'country_id' => $country
            ]);
        }

        return back()->with('status', 'Лот успешно выставлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(lot $lot, $id)
    {
        $lot = $lot->find($id);

        if($lot != Null)
        {
            return view('lots.index', compact('lot'));
        }
        else
        {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(lot $lot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lot $lot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(lot $lot, $id)
    {
        $lot = $lot->find($id);

        if($lot->user_id == Auth::user()->id) {
            unlink(public_path('img/img-lots' . '/' . $lot->img));
            $lot->delete();
            return redirect()->route('profile.showLots')->with('status', 'Лот успешно удалён!');
        }
        else
        {
            abort(404);
        }
    }

    public function orderForm(lot $lot, $id)
    {
        $lot = $lot->find($id);
        if($lot != Null) {
            return view('lots.orderForm', compact('lot'));
        }
        else
            abort(404);
    }

    public function orderCreate(lot $lot, $id, Request $request)
    {
        $lot = $lot->find($id);

        if($lot != Null) {
            $validator = Validator::make($request->all(), [
                'address' => 'required|string',
            ]);


            if ($validator->fails())
            {
                return redirect()->back();
            }

            Order::create([
                'client_id' => Auth::user()->id,
                'lot_id' => $lot->id,
                'executor_id' => $lot->user_id,
                'address' => $request->get('address'),
            ]);

            return redirect()->route('profile.index')->with('status', 'Заказ успешно создан!');
        }
        else
            abort(404);
    }

    public function orderFormChange($id)
    {
        $order = Order::find($id);
        if($order != Null) {
            $statusesOrder = OrderStatus::all();

            return view('profile.orderFormStatus', compact('statusesOrder', 'order'));
        }
        else
            abort(404);

    }

    public function orderChangeStatus($id, Request $request)
    {
        $order = Order::find($id);

        if($order != Null && $order->executor_id == Auth::user()->id) {
            $validator = Validator::make($request->all(), [
                'status_id' => 'required|integer',
            ]);


            if ($validator->fails())
            {
                return redirect()->route('profile.showLots')->with('status', 'Ошибка');
            }

            $order->update([
                'status_id' => $request->get('status_id'),
            ]);

            return redirect()->route('profile.showLots')->with('status', 'Статус заказа успешно изменен');
        }
    }

}
