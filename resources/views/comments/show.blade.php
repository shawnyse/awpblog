@extends ('layouts.app')

@section ('page_title')
    Movie | Comment from {{ $comment -> user -> name }}
@endsection

@section ('page_heading')
    Comment from {{ $comment -> user -> name }}
@endsection

@section ('content')

    <div class="box" style="position: absolute;">
        <table class="table is-striped table is-hoverable">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{ $comment -> user -> name }}</td>
            </tr>
            @if (isset ($comment -> updating_user))
                <tr>
                    <td class="table-row-label">Last Updated By:</td>
                    <td>{{ $comment -> updating_user-> name }}</td>
                </tr>
            @endif
            <tr>
                <td>Date:</td>
                <td>{{ $comment -> updated_at -> format ('l jS F') }}</td>
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
                <td>Comment:</td>
                <td>{{ $comment -> comment }}</td>
            </tr>
            </tbody>
        </table>

        <div class="field is-grouped">
            <p class="control">
                <a class="button is-primary is-outlined" href="/comment/{{ $comment -> id }}/like/">
                    <i class="fa fa-thumbs-o-up"></i>&nbspAgree
                </a>
            <p class="control">
                <a class="button is-danger is-outlined" href="/comment/{{ $comment -> id }}/dislike/">
                    <i class="fa fa-thumbs-o-down"></i>&nbspDisagree
                </a>
            <p class="control">
                <a class="button is-info is-outlined" href="/comment">
                    <i class="fa fa-reply"></i>&nbspBack
                </a>
        </div>
    </div>

@endsection

