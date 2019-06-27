@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>add Financial</h1>
                <a href="{{ route('financial') }}">&lt; Terug</a>
                <div class="content">
                    <form method="post" action="{{ route('addFinancial') }}">
                        @csrf
                        <table>
                            <tr><td><label for="wat">Wat</label></td><td><input name="wat" type="text"></td></tr>
                            <tr><td><label for="hoeveel">Hoeveel</label></td><td><input name="hoeveel" type="text"></td></tr>
                            <tr><td></td><td><input type="submit" value="Opslaan"></td></tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
