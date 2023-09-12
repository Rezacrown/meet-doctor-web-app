<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Models\ManagementAccess\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        // return response($user->detail_user);

        return response()->view('pages.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        // get all request
        $data = $request->all(['name', 'email', 'age', 'contact', 'address', 'gender', 'photo']);


        // return response($data['photo']);

        // find user detail
        $detail = DetailUser::where('user_id', $user)->first();


        // cek path directori storage
        $path = public_path('app/public/assets/file-users');
        if (!File::isDirectory($path)) {
            Storage::makeDirectory('public/assets/file-users');
        }


        // cek insert photo
        if (isset($data['photo'])) {

            $detailPhoto = $detail['photo'];

            $data['photo'] = $request->file('photo')
                ->store(
                    'assets/file-users',
                    'public'
                );

            // delete old photo from storage
            $data_old = 'storage/' . $detailPhoto;
            if (File::exists($data_old)) {
                File::delete($data_old);
            } else {
                File::delete('storage/app/public/' . $detailPhoto);
            }
        }
        // else insert
        // else {
        //     $data['photo'] = "";
        // }




        // update detail
        $detail->update($data);

        return response($detail);

        //    return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403);
    }
}
