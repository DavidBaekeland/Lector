let chatForm = document.getElementById('chat-form');

let chatList = document.getElementById('chat-list');

chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;


 Echo.private(`chat.${chat}`)
     .listen('Chat', (e) => {
         console.log(e.message)
         let createdAtTime = new Date(e.message.created_at);

         let cssClassMessage;

         if (e.message.user_id === userId) {
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
     .listenForWhisper('typing', (e) => {
         if (e.name != "") {
             document.getElementById('typing').innerHTML = `${e.name} is aan het typen ...`
         } else {
             document.getElementById('typing').innerHTML = ""
         }
         chatList.scrollTop = chatList.scrollHeight - chatList.clientHeight;
     });

document.getElementById('messageInput').addEventListener('keyup', function (e) {
    if (document.getElementById('messageInput').value != "")  {
        Echo.private(`chat.${chat}`)
            .whisper('typing', {
                name: userName
            });
    } else {
        Echo.private(`chat.${chat}`)
            .whisper('typing', {
                name: ""
            });
    }

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
            .then(result => {
                chatForm.reset()
                Echo.private(`chat.${chat}`)
                    .whisper('typing', {
                        name: ""
                    });
            })
            .catch(error => console.log('error', error));
    }
})
