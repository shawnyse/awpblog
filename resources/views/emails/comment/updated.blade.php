@component('mail::message')
    # Comment Updated

    Hello {{ $comment -> user -> name }},

    This is a courtesy email to let you know that your comment has been updated.

    @if (isset ($comment -> updating_user))
    The change was made by {{ $comment -> updating_user -> name }}.
    @endif

    Click the button below to see the amended comment.

                http://awpblog.com/comment/{{ $comment -> id }}/

    Best Regards,
    MovieComment
@endcomponent
