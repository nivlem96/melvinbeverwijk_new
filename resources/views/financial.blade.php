@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>Financial</h1>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('financial') }}">
                            @csrf
                            <input name="date" type="hidden" value="{{$lastMonth}}">
                            <input type="submit" value="Vorige maand">
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('financial') }}">
                            @csrf
                            <input name="date" type="hidden" value="{{$nextMonth}}">
                            <input type="submit" value="Volgende maand">
                        </form>
                    </div>
                </div>

                <a href="{{ route('createFinancial') }}">add financial</a>
                <div class="content">
                    <table>
                        <tr><th>Wat</th><th>Wanneer</th><th>Hoeveel</th><th>Actie</th></tr>
                        @foreach($financials as $f)
                            <tr><td>{{$f->wat}}</td><td>{{$f->created_at}}</td><td>{{$f->hoeveel}}</td><td><a href="{{route('deleteFinancial',$f->id)}}">x</a></td></tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
