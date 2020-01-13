@extends ('layouts.app')

@section ('page_title')
    MovieComments
@endsection

@section ('page_heading')
    Result for "{{$keyword}}"
@endsection

@section ('content')
{{--main table--}}
<div class="container main-table">
    <div class="box">
        @if (count ($result) > 0)
            <table class="table is-striped is-hoverable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>Score</th>
                    <th>Comment</th>
                    <th>Agree/Disagree</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($result as $c)
                    <tr>
                        <td style="font-weight: bold">{{ $c -> id }}</td>
                        <td >{{ $c -> name }}</td>
                        <td >{{ $c -> movie }}</td>
                        <td style="text-align: center;">{{ $c -> score }}</td>
                        <td style="word-break:break-all">{{ $c -> comment }}</td>
                        <td style="text-align: center;">{{ $c -> likes }}</td>
                        <td>
                            <a class="button" href="/comment/{{ $c -> id }}/">
                                <ion-icon name="information-circle-outline"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <a class="button" href="/comment/{{ $c -> id }}/edit/">
                                <ion-icon name="create"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <a class="button" href="/comment/{{ $c -> id }}/delete/">
                                <ion-icon name="trash"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <a class="button" href="/comment/{{ $c -> id }}/like/">
                                <ion-icon name="thumbs-up"></ion-icon>
                            </a>
                        </td>
                        <td>
                            <a class="button" href="/comment/{{ $c -> id }}/dislike/">
                                <ion-icon name="thumbs-down"></ion-icon>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="notification is-danger is-light ">
                <p>
                    Sorry, Can' find "{{$keyword}}" about "{{$type}}".
                </p>
            </div>
        @endif
    </div>
</div>

{{--Back to home buttom--}}
<nav class="navbar is-size-4-tablet is-dark is-fixed-bottom">
    <div class="navbar-item">
        <div class="buttons">
            <a class="button is-info is-outlined" href="/comment">
                    <i class="fa fa-reply"></i>&nbspBack
            </a>
        </div>
    </div>
</nav>
@endsection


