@extends ('layouts.app')

@section ('page_title')
    Movie | Edit a Comment from {{ $comment -> name }}
@endsection

@section ('page_heading')
    Edit the Comment from {{ $comment -> name }}
@endsection

@section ('content')

<div class="box">

    <form action = "/comment/{{ $comment -> id }}/edit/" method="POST">

        <fieldset>

            @csrf

            <div class="field">
                <label class="label">
                    User:
                </label>
                <div class="control">
                    <input class="input" type="text" name="name" value="{{ $comment -> name }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Movie:
                </label>
                <div class="control">
                    <input class="input" type="text" name="movie" value="{{ $comment -> movie }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Score:
                </label>
                <div class="control">
                    <div class="select">
                        <select name = "score">
                            <option value="{{ $comment -> score }}">{{ $comment -> score }}</option>
                            <option value="0" >0</option>
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                            <option value="6" >6</option>
                            <option value="7" >7</option>
                            <option value="8" >8</option>
                            <option value="9" >9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Date:
                </label>
                <div class="control">
                    <input class="input" type="text"
                           value="{{ $comment -> updated_at -> format ('l jS F') }} at {{ $comment -> updated_at -> format ('H:i')  }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Current Likes:
                </label>
                <div class="control">
                    <input class="input" type="text" name="likes" value="{{ $comment -> likes }}" readonly>
                </div>
            </div>

            <div class="field">
                <label class="label">
                    Comment:
                </label>
                <div class="control">
                    <input class="input" type="text" name="comment" value="{{ $comment -> comment }}" autofocus>
                </div>
            </div>

            @error ('comment')
            <div class="notification is-warning">
                <p>
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="field">
                <button class="button is-primary" type="submit">Save Changes</button>
            </div>

        </fieldset>
    </form>
</div>

<p>
    <a class="button is-info" href="/">Back</a>
</p>

@endsection
