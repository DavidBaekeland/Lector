let chatForm = document.getElementById('chat-form');

let chatList = document.getElementById('chat-list');

chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;

Echo.channel(`messages`)
    .listen('Message', (e) => {
        let createdAtTime = new Date(e.message.created_at);

        let cssClassMessage;

        if (e.message.user_id == user) {
            cssClassMessage = "personal-message"
        } else {
            cssClassMessage = "normal-message"
        }

        let htmlString = `
                <li class="${cssClassMessage} message">
                    <span class="message-text">
                        ${e.message.message}
                    </span>

                    <span class="time">
                       ${createdAtTime.getHours()}:${createdAtTime.getMinutes()}
                    </span>
                </li>
            `;

        chatList.insertAdjacentHTML("beforeend", htmlString)

        chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;

    })

chatForm.addEventListener("submit", function (e) {
    e.preventDefault();

    let messageInput = document.getElementById('messageInput').value;
    let chat_id = document.getElementById('chat_id').value;

    if (messageInput !== "") {
        let formdata = new FormData();
        formdata.append("message", messageInput);
        formdata.append("chat_id", chat_id);


        let requestOptions = {
            method: 'POST',
            credentials: "same-origin",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": document.querySelector('meta[name=\"csrf-token\"]').content,
            },
            body: formdata,
            redirect: 'follow'
        };


        fetch(urlChat, requestOptions)
            .then(response => response.json())
            .then(result => chatForm.reset())
            .catch(error => console.log('error', error));
    }
})
