<?php

namespace App\Http\Controllers\backsite;

use App\Http\Controllers\Controller;
use App\Models\MasterData\TypeUser;
use Illuminate\Http\Request;

use Auth;
// Gate fungsinya untuk Authorize Role kek gitu
use Gate;
// use Illuminate\Support\Facades\DB;

class TypeUserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // jika memakai all maka akan get dulu di database lalu disortir di bagian phpnya
        // $typeUser = TypeUser::all()->sortBy('id', SORT_DESC, true);

        // sedangkan jika memakai get, maka bisa dilakukan custom dulu querynya baru ambil di database datanya
        // $typeUser = TypeUser::orderBy('id', 'desc')->get();
        // yg $typeuser diatas mirip dengan query Db dibawah
        // $query = DB::table('type_user')->get();

        $typeUser = TypeUser::get();
        // return response($typeUser);

        return response()->view('pages.backsite.management-access.type-user.index', compact('typeUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
