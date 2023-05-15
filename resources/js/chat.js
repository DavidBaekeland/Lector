import './bootstrap';

Echo.private(`chat.${chatId}`)
    .listenForWhisper('typing', (e) => {
        if(e.name !== "") {
            document.getElementById('typing').innerHTML = `${e.name} is aan het typen ...`
        } else {
            document.getElementById('typing').innerHTML = ""
        }

        chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
    });


document.getElementById('messageInput').addEventListener('keyup', function (e) {
    if (document.getElementById('messageInput').value !== "")  {
        Echo.private(`chat.${chatId}`)
            .whisper('typing', {
                name: userName
            });
    } else {
        Echo.private(`chat.${chatId}`)
            .whisper('typing', {
                name: ""
            });
    }
})

Echo.private(`App.Models.User.${userId}`)
    .notification((notification) => {
        let htmlString = `
                        <a wire:click="chat(${notification.chatId})" class="chatItem">
                            ${notification.chatName}
                        </a>`;

        document.getElementById('chats').insertAdjacentHTML('afterbegin', htmlString);
    });


let chatForm = document.getElementById('chat-form');

let chatList = document.getElementById('chat-list');

window.addEventListener('newMessage', (e) => {
    chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
});


chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;


chatForm.addEventListener("submit", function (e) {
    e.preventDefault();

    console.log("dsfq")
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
            .then(result => {
                chatForm.reset()
                Echo.private(`chat.${chat_id}`)
                    .whisper('typing', {
                        name: ""
                    });
            })
            .catch(error => console.log('error', error));
    }
})
