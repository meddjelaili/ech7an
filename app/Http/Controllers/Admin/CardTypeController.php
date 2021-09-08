<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardType;
use Illuminate\Http\Request;

class CardTypeController extends Controller
{
    public $cardType;

    public function __construct(cardType $cardType)
    {
        $this->cardType = $cardType;
    }

    public function changeStatus($id)
    {
        $CardType = $this->cardType::findOrFail($id);
        $CardType->status = !$CardType->status;
        $CardType->update();

        return redirect()->back()->with('success', 'Card Type Status Has Updated');
    }

    public function destroy($id)
    {
        $this->cardType::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Card Has Ben Deleted');
    }
}
