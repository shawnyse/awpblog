@extends ('layouts.app')

@section ('page_title')
    MovieComments | Search
@endsection

@section ('page_heading')
    Result for "{{$keyword}}"
@endsection

@section ('content')
    {{--main table--}}
    <div class="container main-table">
            @if (count ($result) > 0 && $type != 'User')
                <div class="box" style="position: absolute;">
                    <table class="table is-striped is-hoverable">
                        <thead>
                        <tr>
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
                                <td style="font-weight: bold">{{ $c -> user -> name }}</td>
                                <td>{{ $c -> movie }}</td>
                                <td style="text-align: center;">{{ $c -> score }}</td>
                                <td style="word-break:break-all">{{ $c -> comment }}</td>
                                <td style="text-align: center;">{{ $c -> likes }}</td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> id }}/" title="View">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> id }}/edit/" title="Edit">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> id }}/delete/" title="Delete">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> id }}/like/"
                                       title="Agree with this comment">
                                        <ion-icon name="thumbs-up"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> id }}/dislike/"
                                       title="Disagree with this comment">
                                        <ion-icon name="thumbs-down"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @elseif(count ($result) > 0 && $type == 'User')
                <div class="box" style="position: absolute;">
                    <table class="table is-striped is-hoverable">
                        <thead>
                        <tr>
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
                                <td style="font-weight: bold">{{ $c -> name }}</td>
                                <td>{{ $c -> comment -> movie }}</td>
                                <td style="text-align: center;">{{ $c -> comment -> score }}</td>
                                <td style="word-break:break-all">{{ $c -> comment -> comment }}</td>
                                <td style="text-align: center;">{{ $c -> comment -> likes }}</td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> comment -> id }}/" title="View">
                                        <ion-icon name="information-circle-outline"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> comment -> id }}/edit/" title="Edit">
                                        <ion-icon name="create"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> comment -> id }}/delete/" title="Delete">
                                        <ion-icon name="trash"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> comment -> id }}/like/"
                                       title="Agree with this comment">
                                        <ion-icon name="thumbs-up"></ion-icon>
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="/comment/{{ $c -> comment -> id }}/dislike/"
                                       title="Disagree with this comment">
                                        <ion-icon name="thumbs-down"></ion-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="notification is-danger is-light ">
                    <p>
                        Sorry, Can' find "{{$keyword}}" about "{{$type}}".
                    </p>
                </div>
            @endif
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


