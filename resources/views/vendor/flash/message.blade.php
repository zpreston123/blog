@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="message is-{{ $message['level'] }}">
            <div class="message-body is-clearfix">
                {!! $message['message'] !!}

                @if ($message['important'])
                    <button
                        class="delete is-pulled-right"
                        aria-label="delete"
                        onclick="this.parentNode.style.display='none'"
                    >
                    </button>
                @endif
            </div>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
