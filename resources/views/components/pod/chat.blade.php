<div class="col-md-10">
    <div class="m-4" id="message-container" style="overflow-y: scroll; height: 80vh; overflow-x: hidden;">
        <!-- Where chat messages will append to -->
    </div>
    <br>
    <form id="send-container" class="align-items-end">
        <input type="hidden" id="chat_username" value="{{ $user->username }}" />
        <input type="hidden" id="chat_pod_id" value="{{ $pod->id }}" />
        <div class="row align-items-end">
            <div class="col-md-12">
                <div style="width: 90%; float: left;">
                    <input type="text" id="message_input" placeholder="Type your message here.." />
                </div>
                <div style="width: 10%; float: left;">
                    <button class="btn btn-primary btn-block" type="submit" id="send-button">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    let data = {
        username: document.getElementById('chat_username').getAttribute('value'),
        channel: `pod-chat-${document.getElementById('chat_pod_id').getAttribute('value')}`,
        message: document.getElementById('message_input').value
    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    let pusher = new Pusher('10085aca1eae33ea022c', {
        cluster: 'us2'
    });

    let channel = pusher.subscribe(data.channel);
    channel.bind('send-message', function(res) {
        $("#message-container").append(`
            <div class="row">
                <div class="col-md-1 col-sm-3">
                    <img src="${res.avatar}" width="64px" height="64px" />
                </div>
                <div class="col-md-10 col-sm-8">
                    <h5>${res.username} <span style="font-size: 14px; color: var(--secondary)">${res.date}</span></h5>
                    <p>${res.message}</p>
                </div>
            </div>
            <hr>`)
    });

    $("#send-button").click(function(e) {
        e.preventDefault();

        let data = {
            username: document.getElementById('chat_username').getAttribute('value'),
            channel: `pod-chat-${document.getElementById('chat_pod_id').getAttribute('value')}`,
            message: document.getElementById('message_input').value
        }

        $.post('send-chat', data, function(res) {
            console.log(data);
        });

        document.getElementById('message_input').value = '';
    })
</script>
