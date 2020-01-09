@extends ('layouts.app')

@section ('page_title')
    Movie | Comment from {{ $comment -> name }}
@endsection

@section ('page_heading')
    Comment from {{ $comment -> name }}
@endsection

@section ('content')

    <div class="box">
        <table class="table is-striped">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{ $comment -> name }}</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>{{ $comment -> updated_at -> format ('l js F') }}</td>
            </tr>
            <tr>
                <td>Movie:</td>
                <td>{{ $comment -> movie }}</td>
            </tr>
            <tr>
                <td>Score:</td>
                <td>{{ $comment -> score }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ $comment -> comment }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>
        <a class="button is-info" href="/">Back</a>
    </p>
@endsection

