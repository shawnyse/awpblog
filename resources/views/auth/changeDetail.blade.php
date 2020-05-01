@extends ('layouts.app')

@section ('page_title')
    Change | Edit a Comment from {{ Auth::user() -> name }}
@endsection

@section ('page_heading')
    Edit the Details from {{ Auth::user() -> name }}
@endsection

@section ('content')

    <div class="box">

        <form action="update" method="POST">

            <fieldset>

                @csrf

                <div class="field">
                    <label class="label">
                        Name:
                    </label>
                    <div class="control">
                        <input class="input" type="text" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">
                        Email:
                    </label>
                    <div class="control">
                        <input class="input" type="text" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                    </div>
                </div>


                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary is-outlined" type="submit"><i class="fa fa-check"></i>&nbspSave
                        </button>
                    </p>
                    <p class="control">
                        <a class="button is-primary is-outlined" href="/password/reset">
                            <i class="fa fa-wrench"></i>&nbspReset Password
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-info is-outlined" href="/comment"><i class="fa fa-reply fa-2px "></i>&nbspBack</a>
                    </p>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
