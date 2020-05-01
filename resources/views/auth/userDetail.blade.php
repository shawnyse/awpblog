@extends ('layouts.app')

@section ('page_title')
    Movie | {{ Auth::user()->name }}
@endsection

@section ('page_heading')
    Welcome, {{ Auth::user()->name }}
@endsection

@section ('content')

    <div class="box" style="position: absolute;">
        <table class="table is-striped table is-hoverable">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ Auth::user()->email }}</td>
            </tr>
            </tbody>
        </table>

        {{--use js onclick to control css to show and hide comments--}}
        <div class="field is-grouped">
            <p class="control">
                <a class="button is-primary is-outlined" href="/user/changeDetail">
                    <i class="fa fa-wrench"></i>&nbspChange Details
                </a>
            </p>
            <p class="control">
                <button class="button is-danger is-outlined" id="showBtn" style="display: block"
                        onclick="this.style='display:none'; hideBtn.style='display:block'; detailCmts.style='padding-top: 200px; display:block';">
                    <i class="fa fa-eye"></i>&nbspShow your Comments
                </button>
                <button class="button is-danger is-outlined" id="hideBtn" style="display: none"
                        onclick="this.style='display:none'; showBtn.style='display:block';detailCmts.style='padding-top: 200px; display:none';">
                    <i class="fa fa-eye-slash"></i>&nbspHide your Comments
                </button>
            <p class="control">
                <a class="button is-info is-outlined" href="/comment">
                    <i class="fa fa-reply"></i>&nbspBack
                </a>
        </div>
    </div>


    {{--own comments--}}
    <div style="display: none;" id="detailCmts">
        @if (count($detail[0]->comment) > 0)
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
                    @foreach ($detail[0]->comment as $c)
                        <tr>
                            <td style="font-weight: bold">{{ $detail[0] -> name }}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="notification is-info is-light ">
                <p>
                    It seems you haven't add any comment, why not add one?
                </p>
            </div>
            <a class="button is-primary" href="/add/" style="height: 50px;">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                <span>&nbspAdd a Comment</span>
            </a>

        @endif
    </div>
@endsection

