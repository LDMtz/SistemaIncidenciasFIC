<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $tipo = $request->query('tipo', 'todas'); // por defecto 'todas'

        $notificaciones = $tipo === 'todas'
            ? $user->notifications
            : $user->unreadNotifications;

        return view('general.notifications', compact('notificaciones','tipo'));
    }

    public function mark_as_read($id){
        Auth::user()->notifications->findOrFail($id)->markAsRead();
        return back();//->with('success', 'Notificación marcada como leída');

    }

    public function destroy($id){
        Auth::user()->notifications->findOrFail($id)->delete();
        return back();//->with('success', 'Notificación eliminada correctamente');
    }

    public function mark_all_as_read()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();//->with('success', 'Todas las notificaciones fueron marcadas como leídas.');
    }

    public function destroy_all()
    {
        Auth::user()->notifications->each->delete();
        return back();//->with('success', 'Todas las notificaciones fueron eliminadas.');
    }
}
