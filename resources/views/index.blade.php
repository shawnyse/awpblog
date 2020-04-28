@extends ('layouts.app')

@section ('page_title')
    MovieComments
@endsection

@section ('page_heading')
    MovieComments
@endsection

@section ('content')
    {{--search panel&button--}}
    <form action="/search/" method="POST">
        @csrf
        <div class="field has-addons has-addons-centered">
            <p class="control">
                <span class="select">
                    <select name="type">
                        <option>User</option>
                        <option>Movie</option>
                        <option>Score</option>
                        <option>Comment</option>
                        <option>Agree/Disagree</option>
                    </select>
                </span>
            </p>
            <p class="control is-expanded">
                <input class="input is-fullwidth" name="keyword" type="text" placeholder="Enter Keywords for Search">
            </p>
            <div class="control">
                <button class="button is-primary" type="submit">
                <span class="icon">
                        <i class="fa fa-search"></i>
                    </span>
                    <span>&nbspSearch</span>
                </button>
            </div>
        </div>
    </form>

    <div class="container main-table">
        <div class="box">

            @if (count ($comments) > 0)
                @yield('commentTable')
                <table class="table is-striped is-hoverable">
                    <thead>
                    <tr>
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
                            <td style="font-weight: bold">{{ $c -> user -> name }}</td>
                            <td>{{ $c -> movie }}</td>
                            <td style="text-align: center;">{{ $c -> score }}</td>
                            <td style="word-break:break-all">{{ $c -> comment }}</td>
                            <td>{{ $c -> updated_at -> format ('l jS F') }}</td>
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
                                <a class="button" href="/comment/{{ $c -> id }}/like/" title="Agree with this comment">
                                    <ion-icon name="thumbs-up"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <a class="button" href="/comment/{{ $c -> id }}/dislike/" title="Disagree with this comment">
                                    <ion-icon name="thumbs-down"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comments -> links () }}
            @else
                <div class="notification is-info is-light ">
                    <p>
                        The Movie Comment is empty. Why not add a comment?
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{--Bottom navbar--}}
    <nav class="navbar is-size-4-tablet is-dark is-fixed-bottom">
        <div class="navbar-item">
            <div class="buttons">
                <a class="button is-primary" href="/add/">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                    <span>&nbspAdd a Comment</span>
                </a>
            </div>
        </div>
    </nav>
@endsection
