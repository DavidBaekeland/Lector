<x-app-layout>
    <x-card-large id="videoCard">
        <div id="videosDiv"></div>

        <div id="callButtonsDiv">
            <x-chat.button id="audio">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                </svg>
            </x-chat.button>
            <x-chat.button id="camera">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </x-chat.button>
            <x-chat.button :exit="true" :href="route('call.stop')">
                <!-- Generator: Adobe Illustrator 27.5.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 28 28" stroke="currentColor" fill="none" xml:space="preserve">
                <style type="text/css">
                    .st0{stroke-width:1.5;stroke-linecap:round;stroke-linejoin:round;}
                </style>
                    <path class="st0" d="M24.7,11.4c-5.9-5.9-15.4-5.9-21.2,0L1.9,13c-0.9,0.9-0.9,2.3,0,3.2l1,1c0.4,0.4,0.9,0.4,1.4,0.2L8.1,15
                    c0.4-0.2,0.6-0.7,0.5-1.1l-0.2-1.6c-0.1-0.5,0.2-0.9,0.6-1.1c3.2-1.5,6.9-1.5,10.1,0c0.4,0.2,0.7,0.7,0.6,1.1l-0.2,1.6
                    c-0.1,0.4,0.1,0.9,0.5,1.1l3.9,2.3c0.4,0.3,1,0.2,1.4-0.2l1-1c0.9-0.9,0.9-2.3,0-3.2L24.7,11.4z"/>
                </svg>
            </x-chat.button>
        </div>
    </x-card-large>


    <script src="https://unpkg.com/peerjs@1.4.7/dist/peerjs.min.js"></script>
    <script type="module">
        const videoGrid = document.getElementById('videosDiv');

        const peer = new Peer();

        const myVideo = document.createElement('video')
        myVideo.muted = true;

        navigator.mediaDevices.getUserMedia({
            video: {
                'width': {'ideal': 728},
                'height': {'ideal': 410}
            },
            audio: true
        }).then(stream => {
            document.getElementById('camera').onclick = (e) => {
                console.log(stream.getVideoTracks()[0]);
                stream.getVideoTracks()[0].enabled = !stream.getVideoTracks()[0].enabled;

                let htmlString;

                if (!stream.getVideoTracks()[0].enabled) {
                    htmlString = `
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M12 18.75H4.5a2.25 2.25 0 01-2.25-2.25V9m12.841 9.091L16.5 19.5m-1.409-1.409c.407-.407.659-.97.659-1.591v-9a2.25 2.25 0 00-2.25-2.25h-9c-.621 0-1.184.252-1.591.659m12.182 12.182L2.909 5.909M1.5 4.5l1.409 1.409" />
                                </svg>
                             `;

                    e.target.innerHTML = htmlString

                } else {
                    htmlString = `
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                </svg>

                             `;

                    e.target.innerHTML = htmlString
                }
            }

            document.getElementById('audio').onclick = (e) => {
                console.log(stream.getAudioTracks()[0]);
                stream.getAudioTracks()[0].enabled = !stream.getAudioTracks()[0].enabled;

                let htmlString;

                if (!stream.getAudioTracks()[0].enabled) {
                    htmlString = `
                         <!-- Generator: Adobe Illustrator 27.5.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" baseProfile="basic" id="Layer_1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24"
                             xml:space="preserve">
                        <path fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" d="M12,18.8c3.3,0,6-2.7,6-6
                            v-1.5 M12,18.8c-3.3,0-6-2.7-6-6v-1.5 M12,18.8v3.8 M8.2,22.5h7.5 M12,15.8c-1.7,0-3-1.3-3-3V10V9.3V6.3V4.5c0-1.7,1.3-3,3-3
                            s3,1.3,3,3v8.2C15,14.4,13.7,15.8,12,15.8z"/>
                        <line fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-miterlimit="10" x1="4.4" y1="1.6" x2="19.6" y2="21.6"/>
                        </svg>
                             `;
                } else {
                    htmlString = `
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                            </svg>
                         `;
                };

                e.target.innerHTML = htmlString
            }

            addVideoStream(myVideo, stream)

            peer.on('call', call => {
                call.answer(stream);
                const video = document.createElement('video')
                call.on('stream', userVideoStream => {
                    console.log(stream)
                    addVideoStream(video, userVideoStream);
                })
            })

            Echo.private(`chat.{{$chat_id}}`)
                .listenForWhisper('user-connected', (e) => {
                    console.log(e)

                    connectToNewUser(e.user_id, stream)
                });
        })


        peer.on('open', id => {
            setTimeout(() => {
                Echo.private(`chat.{{$chat_id}}`)
                    .whisper('user-connected', {
                        user_id: id
                    });
            }, 1000);
        })

        function connectToNewUser(userId, stream)  {
            const call = peer.call(userId, stream)
            const video = document.createElement('video')

            call.on('stream', userVideoStream => {
                addVideoStream(video, userVideoStream)
            })
            call.on('close', () => {
                video.remove()
            })
        }

        function addVideoStream(video, stream)  {
            video.srcObject = stream;
            video.addEventListener('loadedmetadata', () => {
                video.play()
            })
            videoGrid.append(video)
            stylingVideo()
        }

        function stylingVideo() {
            let el = document.getElementsByTagName("video");

            if(el.length > 3) {
                for (let element of el) {
                    element.style.height = "auto"
                    element.style.width = "33%"

                }
            }

            if (el.length === 2) {
                for (let element of el) {
                    element.style.height = "auto"
                    element.style.width = '49%'
                }

            }

            if (el.length === 3) {
                for (let element of el) {
                    element.style.height = "auto"
                    element.style.width = '32%'
                    element.style.margin = '10px';
                }
            }
        }
    </script>
</x-app-layout>
