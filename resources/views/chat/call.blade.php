<x-app-layout>
    <x-card-large id="videoCard">
        <div id="videosDiv">
{{--            <video id="localVideo" autoplay playsinline>  </video>--}}
        </div>



        <div id="callButtonsDiv">
            <x-chat.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 006-6v-1.5m-6 7.5a6 6 0 01-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 01-3-3V4.5a3 3 0 116 0v8.25a3 3 0 01-3 3z" />
                </svg>
            </x-chat.button>
            <x-chat.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </x-chat.button>
            <x-chat.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                </svg>
            </x-chat.button>
            <x-chat.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
            </x-chat.button>
            <x-chat.button :exit="true">
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

         if(@json($otherPeerId)) {
             let peer = new Peer({
                 host: "localhost",
                 port: 9000,
                 path: "/myapp",
             });

             let getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
             getUserMedia({video: true, audio: false}, function(stream) {
                 let call = peer.call(@json($otherPeerId), stream);
                 call.on('stream', function(remoteStream) {
                     const remoteVideo = document.createElement('video');
                     remoteVideo.srcObject = remoteStream;
                     remoteVideo.addEventListener('loadedmetadata', () => {
                         remoteVideo.play()
                     })
                     document.getElementById('videosDiv').append(remoteVideo)

                     console.log(remoteStream)
                     stylingVideo();

                 });
             }, function(err) {
                 console.log('Failed to get local stream' ,err);
             });
         }else if(@json($peerUuid)) {
             let peer = new Peer(@json($peerUuid), {
                 host: "localhost",
                 port: 9000,
                 path: "/myapp",
             });

             let getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
             peer.on('call', function(call) {
                 getUserMedia({video: true, audio: false}, function(stream) {
                     call.answer(stream);
                     call.on('stream', function(remoteStream) {
                         const remoteVideo = document.createElement('video');
                         remoteVideo.srcObject = remoteStream;
                         remoteVideo.addEventListener('loadedmetadata', () => {
                             remoteVideo.play()
                         })
                         document.getElementById('videosDiv').append(remoteVideo)

                         stylingVideo();

                     });

                     console.log(stream);
                 }, function(err) {
                     console.log('Failed to get local stream' ,err);
                 });
             });
         }

         function stylingVideo() {
             let el = document.getElementsByTagName("video");

             if(el.length > 3) {
                 for (let element of el) {
                     element.style.height = "auto"
                     element.style.width = "33%"

                 }
             }

             if (el.length == 2) {
                 for (let element of el) {
                     element.style.height = "auto"
                     element.style.width = '49%'
                 }

             }

             if (el.length == 3) {
                 for (let element of el) {
                     element.style.height = "auto"
                     element.style.width = '32%'
                     element.style.margin = '10px';
                 }
             }
         }
    </script>
</x-app-layout>
