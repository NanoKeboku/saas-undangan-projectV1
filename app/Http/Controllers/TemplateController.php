<?php

namespace App\Http\Controllers;

class TemplateController extends Controller
{
    public function preview($id)
    {
        $template = (object) [
            'id' => $id,
            'nama_pria' => 'Nama Pria',
            'nama_wanita' => 'Nama Wanita',
        ];

        return view('invitations.themes.wedding-v1.index', compact('template'));
    }

    public function selectTemplate($templateId){
    // Cek apakah ID valid
    $exists = collect($this->templates)->contains('id', $templateId);
    
    if($exists) {
        session()->put('selected_template', $templateId);
        return redirect()->route('template.preview', ['id' => $templateId]);
    }
}
}
