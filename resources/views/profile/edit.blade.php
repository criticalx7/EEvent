@extends('layouts.app')

@section('content')
    <div class="container w-75 mx-auto">
        <h1>Account Settings</h1>
        <br>
        <form method="post" class="contact1-form validate-form">
            @method('PUT')
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">

                    <h2>General</h2>
                    <label style="font-size: 18px">Name :</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control"
                           size="100">
                    <br>
                    <label style="font-size: 18px">Email :</label>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control"
                           size="100">
                    <br>
                    <label style="font-size: 18px">Gender : </label>
                    <input type="radio" name="gender" value="Male" class="form-control"> Male<br>
                    <input type="radio" name="gender" value="Female" class="form-control"> Female<br>
                    <br><br>
                    <h2>Change Password</h2>
                    <label style="font-size: 18px">Your current password</label>
                    <input type="text" name="currentPass" value="" class="form-control"
                           size="100">
                    <br>
                    <label style="font-size: 18px">Your new password</label>
                    <input type="text" name="newPass" value="" class="form-control"
                           size="100">
                    <br>
                    <label style="font-size: 18px">Retype your new password</label>
                    <input type="text" name="retypeNewPass" value="" class="form-control"
                           size="100">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection