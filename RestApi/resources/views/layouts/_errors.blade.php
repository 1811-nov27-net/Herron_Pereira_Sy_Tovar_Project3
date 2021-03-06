<div class='col-md-12 returnedMessages text-center'>
    @if (Session::has('message') > 0)
        <div class="alert {{Session::get('alert-type')}} alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <ul>
                @foreach (Session::get('message') as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>
    setTimeout(function() {
        $('.alert-dismissable').fadeOut('slow');
    }, 3000);
</script>