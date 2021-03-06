<?php

namespace App\Http\Controllers;

use App\Book;
use App\Mail\ApprovedUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Here we get All the users from the database, and all books from database to list them in the ADMIN panel area.
    public function index(Request $request)
    {
        $users = User::all();
        $search_query = $request->input('search_query');
        $books = Book::search($search_query)->get();

        return view('admin.index', compact(['users', 'books', 'search_query']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    //Here we update particular users status when they register, and automatically assign them role User.
    // Admin can change that role in the function updateRole bellow
    public function update(Request $request, User $user)
    {
        $user_id = $request->id;
        $new_usr = $user::find($user_id);
        new User();
        $new_usr->assignRole('User');
        $user->where('id', $request->id)->update(['status' => $request->status]);


        $email = request('email');
        Mail::to($email)->send(new ApprovedUser());

        return back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // when Admin click approve user, auto role is User. Here we can change that status to librarian.
    public function updateUserRole(Request $request, User $user){

        new User();

        $user_id = $request->id;
        $get_role = request('role');

        $new_usr = $user::find($user_id);
        $new_usr->assignRole($get_role);

        return back();

    }
}
