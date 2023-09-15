<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\ManagementAccess\DetailUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Url;

use function PHPUnit\Framework\throwException;

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
        // gk perlu query lagi sdh bisa ambil dari relasi di $user data detail nya
        // $detail = DetailUser::where('user_id', $user->id)->first();

        // return response(url(Storage::url($user->detail_user->photo)));

        // Url(Storage::url($user->detail_user->photo));

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
    public function show($profile)
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
    public function update(UpdateProfileRequest $request, $profile)
    {
        // get all request
        // $data = $request->all(['name', 'email', 'age', 'contact', 'address', 'gender', 'photo']);
        $data = $request;



        // find detail_user
        $detail = DetailUser::where('user_id', $profile)->first();

        // find detail_user by id
        $user = User::findOrFail($profile);

        // Check email perubahan
        // if ($user->email !== $data['email']) {
        //     $otherUser = User::where('email', $data['email'])->first();

        //     if ($otherUser !== $user->email) {

        //         return redirect()->back();
        //         // var_dump($otherUser);
        //     }
        // }



        // cek path directori storage
        $path = public_path('app/public/assets/file-users');
        if (!File::isDirectory($path)) {
            Storage::makeDirectory('public/assets/file-users');
        }


        // cek insert photo
        if ($data['photo']) {


            // store data photo ke penyimpanan laravel
            $data['photo'] = $request->file('photo')->store(
                'assets/file-users',
                'public'
            );


            // set new variable and value for detailPhoto
            $detailPhoto = $detail['photo'] ? $detail['photo'] : null;


            // cek apakah photo ada di DB dan jika ada delete old photo from storage, sekaligus cek juga di penyimpanan
            if ($detail['photo']) {
                $data_old = 'storage/' . $detailPhoto;
                if (File::exists($data_old)) {
                    File::delete($data_old);
                } else {
                    File::delete('storage/app/public/' . $detailPhoto);
                }
            }
        }


        // var_dump($user);
        // var_dump($detail);
        // var_dump($request->file('photo')->originalName());

        // update user data
        $user->name = $data['name'];
        $user->email = $data['email'];

        // update detail
        $detail['contact'] = $data['contact'];
        $detail['address'] = $data['address'];
        $detail['gender'] = $data['gender'];
        $detail['photo'] = $data['photo'] ? $data['photo'] : $detail['photo'];


        // update ke Database
        $user->save();
        $detail->save();
        // DetailUser::where('user_id', $profile)->update($detail);



        return response($request['photo']);

        return redirect()->route('index');

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
