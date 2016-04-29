@extends('layouts.master')

    @section('content')

        @if(Session::has('message'))
            <div class="alert alert-danger text-center"><h3>{{Session::get('message')}}</h3></div>
        @endif

        <div class="formLog">
            <h1>Connexion à la gestion des articles</h1>

            <form method="post" action="{{url('login')}}" class="form-horizontal">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email : </label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                        @if($errors->has('email')) <span class="error">{{$errors->first('email')}}</span>@endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password : </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" id="password">
                        @if($errors->has('password')) <span class="error">{{$errors->first('password')}}</span>@endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="checkbox">
                            <label for="remember">
                                <input type="checkbox" name="remember" id="remember" value="remember"> Se souvenir de moi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection