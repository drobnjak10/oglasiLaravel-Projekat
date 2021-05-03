<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index() {
        if(! isset(Auth::user()->id)) {
            return redirect(route('welcome'));
        }

        $ads = Ad::where('user_id', Auth::user()->id)->get();

        return view('userProfile', compact('ads'));
    }

    public function showDepositForm() {
        if(! isset(Auth::user()->id)) {
            return redirect(route('welcome'));
        }

        return view('depositForm');
    }

    public function addDeposit(Request $request) {

        $request->validate([
            'deposit' => 'required|max:4'
        ],
        [
            'deposit.max' => 'Deposit ne sme biti veci od 9999 RSD.'
        ]);

        $user = Auth::user();
        $user->deposit = $user->deposit + $request->deposit;
        $user->save();

        return redirect(route('userProfile'))->with('updated', 'Deposit je uspesno dodat!');

    }

    public function adInfo($id) {

        $ad = Ad::find($id);

        if(! isset(Auth::user()->id)) {
            return redirect(Route('welcome'));
        }

        if(Auth::user()->id != $ad->user_id) {
            return redirect(Route('welcome'));
        }

        return view('userAdInfo', compact('ad'));
    }

    public function deleteAd($id) {
        $ad = Ad::find($id);
        $ad->delete();

        return redirect(route('userProfile'))->with('deleted', 'Oglas je uspesno obrisan!');
    }
}
