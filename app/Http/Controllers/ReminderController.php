<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reminder' => ['required', 'max:255'],
            'date' => ["required"],
            'time' => ['required'],
        ]);

        Reminder::create([
            'reminder' => $validated['reminder'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'user_id' => auth()->id(),
        ]);

        return redirect('/dashboard');
    }

    public function delete(Reminder $reminder)
    {
        if ($reminder->user_id === auth()->id()) {
            $reminder->delete();
            return redirect('/dashboard')->with('success', 'Atgādinājums veiksmīgi izdzēsts.');
        }

        return redirect('/dashboard')->with('error', 'Neizdevās izdēst.');
    }
    public function edit(Reminder $reminder){
        return view("dashboard.edit", ['reminder' => $reminder]);
    }

    public function update(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'reminder' => ['required', 'max:255'],
            'date' => ['required'],
            'time' => ['required'],
        ]);

        $reminder->update([
            'reminder' => $validated['reminder'],
            'date' => $validated['date'],
            'time' => $validated['time'],
        ]);

        return redirect("/dashboard");
    }

    public function markAsDone(Reminder $reminder)
    {
        if ($reminder->user_id === auth()->id()) {
            $reminder->update(['is_done' => true]);
            return redirect('/dashboard')->with('success', 'Atgādinājums atzīmēts kā izdarīts.');
        }

        return redirect('/dashboard')->with('error', 'Neizdevās atzīmēt atgādinājumu.');
    }

    public function renewForm(Reminder $reminder){
        return view("dashboard.renew", ['reminder' => $reminder]);
    }
    public function renew(Request $request, Reminder $reminder)
    {
        $validated = $request->validate([
            'date' => ['required'],
            'time' => ['required'],
        ]);

        if ($reminder->user_id === auth()->id()) {
            $reminder->update([
                'is_done' => false,
                'date' => $validated['date'],
                'time' => $validated['time'],
            ]);

            return redirect('/dashboard')->with('success', 'Atgādinājums atjaunots.');
        }

        return redirect('/dashboard')->with('error', 'Neizdevās atjaunot atgādinājumu.');
    }
    
}
