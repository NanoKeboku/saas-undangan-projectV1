<?php

namespace App\Http\Controllers;

class InvitationController extends Controller
{
    /**
     * Peta ID template ke folder tema & nama display
     */
    private array $themes = [
        1 => ['folder' => 'wedding-v1', 'name' => 'Elegant Classic'],
        2 => ['folder' => 'wedding-v2', 'name' => 'Romantic Pink'],
        3 => ['folder' => 'wedding-v3', 'name' => 'Golden Luxury'],
        4 => ['folder' => 'wedding-v4', 'name' => 'Modern Minimal'],
    ];

    /**
     * Tampilkan wrapper preview dengan sidebar + iframe
     */
    public function preview(int $id)
    {
        $theme = $this->themes[$id] ?? $this->themes[1];

        return view('invitations.layouts.preview-template', [
            'id'           => $id,
            'templateName' => $theme['name'],
            'renderUrl'    => route('template.render', $id),
        ]);
    }

    /**
     * Render konten undangan murni (dipanggil oleh src iframe)
     * Membaca data dari session wizard jika tersedia
     */
    public function render(int $id)
    {
        $theme = $this->themes[$id] ?? $this->themes[1];
        $folder = $theme['folder'];

        // Ambil data dari session wizard Studio jika ada
        $session = session()->get('temp_invitation', []);

        $data = [
            'bride_name'  => $session['bride_name']  ?? 'Nama Pengantin Wanita',
            'groom_name'  => $session['groom_name']  ?? 'Nama Pengantin Pria',
            'event_date'  => $session['event_date']  ?? null,
            'event_time'  => $session['event_time']  ?? '19:00',
            'venue'       => $session['venue']       ?? 'Nama Gedung',
            'city'        => $session['city']        ?? 'Kota',
            'theme_color' => $session['theme_color'] ?? '#8b5cf6',
            'font'        => $session['font']        ?? 'Playfair Display',
            'gallery'     => $session['gallery']     ?? [],
        ];

        // Cek apakah view tema tersedia, fallback ke wedding-v1
        $viewPath = "invitations.themes.{$folder}.index";
        if (! view()->exists($viewPath)) {
            $viewPath = 'invitations.themes.wedding-v1.index';
        }

        return view($viewPath, $data);
    }
}
