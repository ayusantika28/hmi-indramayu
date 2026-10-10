<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSettingController extends Controller
{
    public function edit()
    {
        $profile = ProfileSetting::first();

        if (!$profile) {
            $profile = ProfileSetting::create([
                'nama_organisasi' => 'HMI Cabang Indramayu',
                'periode' => null,
                'logo' => null,
                'visi' => null,
                'misi' => null,
            ]);
        }

        return view('admin.profile-setting.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = ProfileSetting::first();

        if (!$profile) {
            $profile = new ProfileSetting();
        }

        $validated = $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'periode' => 'nullable|string|max:100',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('logo')) {

            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }

            $validated['logo'] = $request
                ->file('logo')
                ->store('profile', 'public');
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()
            ->route('admin.profile-setting.edit')
            ->with('success', 'Pengaturan profil berhasil diperbarui.');
    }
}
