@extends('layout.app')
@section('content')
        <hr />
        <h1 style="display: inline-block;">Users</h1>
        <hr />
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>firstName</td>
                    <td>lastName</td>
                    <td>email</td>
                    <td>phone</td>

                </tr>
            </tbody>
        </table>

      @endsection
