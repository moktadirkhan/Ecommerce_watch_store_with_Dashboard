<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
public function index()
{
    return view('users.index')->with('users',User::all());
}
public function makeadmin(User $user)
{
  $user->role='admin';
  $user->save();
  session()->flash('success','User made admin successfully');
  return redirect(route('users.index'));
}
public function makemoderator(User $user)
{
  $user->role='moderator';
  $user->save();
  session()->flash('success','User made moderator successfully');
  return redirect(route('users.index'));
}
}
