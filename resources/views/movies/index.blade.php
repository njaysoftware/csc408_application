@extends('layouts.main')

@section('header')
    <!-- Datatables Styles -->
    {!! Html::style('//cdn.datatables.net/1.10.7/css/jquery.dataTables.css') !!}
@stop

@section('content')

    <!-- will be used to show any messages -->
    @include('layouts.partials.messages')

    <div class="row">
        <div class="col-xs-4 h3">Manage Movies</div>
        <div class="col-xs-1 col-xs-offset-7" style="margin-top: 20px;">
            <a href="{!! URL::to('movies/create') !!}" class="btn btn-xs btn-success pull-right" title="Create new movie">
                <span class="glyphicon glyphicon-plus"></span> Movie</a>
        </div>
    </div>

    <div class="row">
        @if ($movies)
            <table id="data_table" class="table table-striped">
                {{-- Fx this for javascript --}}
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Length (min)</th>
                    <th>DVD?</th>
                    <th>BluRay?</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="fbody">

                @foreach ($movies as $movie)
                    <tr>
                        <td>{!! $movie['title'] !!}</td>
                        <td>{!! $movie['rating'] !!}</td>
                        <td>{!! $movie['length'] !!}</td>
                        <td>{!! Html::yesNo( $movie['onDVD']) !!}</td>
                        <td>{!! Html::yesNo( $movie['onBluRay']) !!}</td>
                        <td>
                            <a href="/movies/{!! $movie['id'] !!}" class="button btn btn-primary btn-xs"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--  $movies->links() !!} -->
        @else
            <h4>No Movies in the catalog yet!</h4>
        @endif

    </div>

@stop

@section('extraJS')

    <script>
        $(document).ready( function () {
            $('#data_table').DataTable();
        } );

        $(document).ready(function(){

            $('.delbtn').click(function(){

                return confirm("Are You sure?");

            });
        });


    </script>


@stop