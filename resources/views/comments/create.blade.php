@extends ('layouts.app')

@section ('page_title')
    Movie | Add a Comment
@endsection

@section ('page_heading')
    Add a New Comment
@endsection

@section ('content')

    <div class="box">

        <form action = "/add/" method="POST">

            <fieldset>

                @csrf

                <div class="field">
                    <label class="label">
                        User
                    </label>
                    <div class="control">
                        <input class="input" type="text" name="name" placeholder="Enter User's Name">
                    </div>
                </div>

                @error ('name')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="field">
                    <label class="label">
                        Movie
                    </label>
                    <div class="control">
                        <input class="input" type="text" name="movie" placeholder="Enter Movie's Name">
                    </div>
                </div>
                @error ('movie')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="field">
                    <label class="label">
                        Score
                    </label>
                    <div class="control">
                        <div class="select">
                            <select name="score">
                                <option> </option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                </div>
                @error ('score')
                <div class="notification is-warning is-light">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <div class="field">
                    <label class="label">
                        Comment
                    </label>
                    <div class="control">
                        <input class="input" type="text" name="comment" placeholder="Enter the Comment">
                    </div>
                </div>

                @error ('comment')
                <div class="notification is-warning">
                    <p>
                        {{ $message }}
                    </p>
                </div>
                @enderror

                <label class="checkbox">
                    <input type="checkbox">
                    I have read the <a href="https://hawzah.net/en/Article/View/78904/The-Disadvantages-of-Lying">consequence</a>
                    and promise this comment is my real thought.<br><br>
                </label>
                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-primary is-outlined" type="submit">
                    <span class="icon">
                        <i class="fa fa-plus-circle"></i>
                    </span>
                            <span>Add Comment</span>
                        </button>
                    <p class="control">
                        <a class="button is-info is-outlined" href="/comment">
                            <i class="fa fa-reply "></i>&nbspBack
                        </a>
                </div>

            </fieldset>
        </form>
    </div>

@endsection
