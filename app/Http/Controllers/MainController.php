<?php

namespace App\Http\Controllers;

use App\Models\DataMessage;
use App\Models\Message;
use App\Models\MyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MainController extends Controller
{
    //
    public function message()
    {
        $dataPesan = Message::orderBy('created_at', 'DESC')->get();

        return view('admin.message', compact('dataPesan'));
    }

    public function editMessage(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        DataMessage::where('id', 1)->update([
            'message' => $request->input('content'),
        ]);

        return redirect()->back()->with('success', ' berhasil diubah');
    }

    public function content()
    {
        $dataPesan = DataMessage::where('id', 1)->first();

        return view('admin.edit', compact('dataPesan'));
    }

    public function storePesan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pesan' => 'required',
            'optionStatus' => 'required',
        ]);

        Message::create([
            'name' => $request->input('name'),
            'pesan' => $request->input('pesan'),
            'confirm' => $request->input('optionStatus'),
        ]);

        return redirect()->back()->with('success', 'Ucapan berhasil terkirim');
    }

    public function landingPage()
    {
        $message = Message::get();

        return view('invitations.theme.wedding-v1.index', compact('message'));
    }

    public function toTamu()
    {
        return view('to');
    }

    public function delTamu($id)
    {
        MyContact::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil terhapus');
    }

    public function delMessage($id)
    {
        Message::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil terhapus');
    }

    public function contact()
    {
        $data = MyContact::get();
        $dataMessage = DataMessage::where('id', 1)->first();

        return view('admin.dsadmin', compact('data', 'dataMessage'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'whatsapp' => 'required',
        ]);

        $slug = Str::slug($request->name);
        MyContact::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'number' => $request->input('whatsapp'),
        ]);

        return redirect()->back()->with('success', 'Tamu undangan berhasil dibuat');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('toTamu');
    }

    public function login()
    {

        return view('login');
    }

    public function storeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('contact');
            }
        } else {
            return redirect('/login')->withErrors('Username dan Password yang dimasukan tidak sesuai')->withInput();
        }
    }

    public function sendUndangan($slug)
    {
        $mycontact = MyContact::where('slug', $slug)->first();

        return view('to', compact('mycontact'));
    }
}
