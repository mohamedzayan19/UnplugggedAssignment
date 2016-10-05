<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUserRequest;
use Hash;
use Search;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => 'store']);
        $this->middleware('admin', ['only' => 'destroy', 'edit', 'update']);
    }

   public function create()
    {
        return view('users.create');
    }
        public function store(CreateUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password =Hash::make($request->password); 
        $user->save();
        Search::insert('user'.$user->id, array(
        'title' => $request->name,
        ));
        return redirect()->action('HomeController@index');
    }

    public function edit($usera)
    {
          Log::info('Showing user profile for user: '.$usera);
        #if (Auth::user()->id == $user) {
          $user = User::find($usera);
            return view("users.edit", compact('user'));
        #} else {
         #   return view("errors.401");
        #}
    }

    public function update(Request $request,$usera)
    {
        $user = User::find($usera);
        $validations = [
            'name' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'min:2', 'max:30']
        ];
        $this->validate($request, $validations);
        $user->update($request->all());
        $user->role = $request->role;
        $user->save();
        return redirect()->action('HomeController@index');
    }

    public function destroy($user)
    {
        $usera = User::find($user);
        $usera->delete();
        return redirect()->route('home')->with("message", "User successfully deleted");
    }
}
