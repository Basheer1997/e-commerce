@extends('layout.app')
@section('content')
        <form>
            <fieldset>
                <legend>Sign up</legend>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email"
                           class="form-control"
                           id="exampleInputEmail1"
                           placeholder="Enter email" />
                </div>
                <div class="form-group">
                    <label for="exampleInputFirstName1">First Name</label>
                    <input type="email"
                           class="form-control"
                           id="exampleInputFirstName1"
                           placeholder="Enter First Name" />
                </div>
                <div class="form-group">
                    <label for="exampleInputLastName1">Last Name</label>
                    <input type="email"
                           class="form-control"
                           id="exampleInputLastName1"
                           placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password"
                           class="form-control"
                           id="exampleInputPassword1"
                           placeholder="Password" />
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Confirm Password</label>
                    <input type="password"
                           class="form-control"
                           id="exampleInputConfirmassword1"
                           placeholder="Password" />
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </fieldset>
        </form>

        @endsection
