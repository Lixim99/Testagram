<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Image;

class ProfileController extends Controller
{
    /**
     * @param $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $user)
    {
        return view('profile.index', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'portrait_src' => [
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
            'url' => 'url',
            'user_name' => 'required',
            'title' => 'max:255',
            'description' => 'max:550',
        ]);

        if (!empty($data['portrait_src'])) {
            $fileName = time() . '.' . $data['portrait_src']->extension();

            $data['portrait_src']->storeAs('public/upload/img/portraits/', $fileName);

            Image::make(storage_path('app/public/upload/img/portraits/' . $fileName))
                ->fit(150, 150)->save();

            $data['portrait_src'] = 'storage/upload/img/portraits/' . $fileName;
        } else {
            $data['portrait_src'] = 'storage/upload/img/portraits/default.jpg';
        }

        $user->profile->update($data);

        return redirect()->route('profile.show', $user->id);
    }
}
