@extends ('layouts.app')

@section ('page_title')
    MovieComments
@endsection

@section ('page_heading')
    MovieComments
@endsection

@section ('content')

    <div class="container main-table">
        <div class="box">

            @if (count ($comments) > 0)
                <table class="table is-striped is-hoverable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Movie</th>
                        <th>Score</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Agree/Disagree</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($comments as $c)

                        <tr>
                            <td>{{ $c -> id }}</td>
                            <td>{{ $c -> name }}</td>
                            <td>{{ $c -> movie }}</td>
                            <td>{{ $c -> score }}</td>
                            <td>{{ $c -> comment }}</td>
                            <td>{{ $c -> updated_at -> format ('D jS F') }}</td>
                            <td>{{ $c -> likes }}</td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/edit/">
                                    <ion-icon name="create"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button"
                                   href="/comment/{{ $c -> id }}/delete/">
                                    <ion-icon name="trash"></ion-icon>
                                </a>
                            </td>
                            <td><a class="button"
                                   href="/comment/{{ $c -> id }}/like/">
                                    <ion-icon name="thumbs-up"></ion-icon>
                                </a>
                            </td>
                            <td><a class="button"
                                   href="/comment/{{ $c -> id }}/dislike/">
                                    <ion-icon name="thumbs-down"></ion-icon>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

                {{ $comments -> links () }}

            @else
                <div class="notification is-info">
                    <p>
                        The Movie Comment is empty. Why not add a comment?
                    </p>
                </div>
            @endif
        </div>

        <div class="box">
            <a class="button is-primary" href="/add/">Add a Comment</a>
        </div>

    </div>

@endsection

