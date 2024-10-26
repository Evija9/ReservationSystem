<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Item;
use App\Models\Premises;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reservation(){
        return view('reservation');
    }
    
    public function createReservation(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['required', 'max:255'],
            'type' => ['required', 'in:car,premises,item'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after:startDate']
        ]);

        $incomingFields['client_id'] = auth()->id();
        $request->session()->put('reservation_data', $incomingFields);
        return redirect()->route('details', ['type' => $incomingFields['type']]);
    }

    public function details($type)
    {

        $options = [];
        switch ($type) {
            case 'car':
                $options = Car::all();
                break;
            case 'premises':
                $options = Premises::all();
                break;
            case 'item':
                $options = Item::all();
                break;
            default:
                abort(404);
        }
        return view('reservationDetails', [
            'options' => $options,
            'type' => $type,
        ]);
    }

    public function saveReservation(Request $request)
    {
        $reservationData = session('reservation_data');

        $validatedData = $request->validate([
            'option_id' => 'required|exists:' . $reservationData['type'] . 's,id'
        ]);

        $reservation = Reservation::create($reservationData);

        switch ($reservationData['type']) {
            case 'car':
                \DB::table('carsreservs')->insert([
                    'car_id' => $validatedData['option_id'],
                    'reservation_id' => $reservation->id
                ]);
                break;
            case 'premises':
                \DB::table('premisessreservs')->insert([
                    'premises_id' => $validatedData['option_id'],
                    'reservation_id' => $reservation->id
                ]);
                break;
            case 'item':
                \DB::table('itemsreservs')->insert([
                    'item_id' => $validatedData['option_id'],
                    'reservation_id' => $reservation->id
                ]);
                break;
            default:
                abort(404);
        }

        $request->session()->forget('reservation_data');

        return redirect('/')->with('success', 'Reservation created successfully!');
    }

    public function showEditScreen(Reservation $reservation)
    {
        if (auth()->user()->id !== $reservation['client_id']){
            return redirect('/');
        } 

        return view('edit-reservation', ['reservation' => $reservation]);
    }

    public function updateReservation(Reservation $reservation, Request $request)
    {
        if (auth()->user()->id !== $reservation['client_id']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'startDate'=> 'required',
            'endDate'=> 'required'
        ]);

        $reservation->update($incomingFields);
        return redirect('/');
    }

    public function cancelReservation(Reservation $reservation)
    {
    if (auth()->user()->id === $reservation['client_id']) {
        $reservationType = $reservation->type;

        switch ($reservationType) {
            case 'car':
                \DB::table('carsreservs')
                    ->where('reservation_id', $reservation->id)
                    ->delete();
                break;
            case 'premises':
                \DB::table('premisesreservs')
                    ->where('reservation_id', $reservation->id)
                    ->delete();
                break;
            case 'item':
                \DB::table('itemsreservs')
                    ->where('reservation_id', $reservation->id)
                    ->delete();
                break;
        }

        $reservation->delete();
    }

    return redirect('/');
    }

}
