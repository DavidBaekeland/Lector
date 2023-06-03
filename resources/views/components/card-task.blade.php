@props([
    "task"
])

<div class="card card-large card-task" x-data="{ open: false }">
    <div class="announcement-title-active">
        <h3>{{ $task->name }}</h3>
    </div>
    <span>
        <hr>
        <div class="info-tasks announcement">
            <p>{{\Carbon\Carbon::create($task->deadline)->format("H:m") }} - {{\Carbon\Carbon::create($task->deadline)->format("d/m")}}</p>
            <p>{{$task->points}} punten</p>
        </div>
        <p class="announcement">
            {!! $task->description !!}
        </p>
    </span>
    <x-primary-button class="task-button" x-on:click="open = ! open">Indienen</x-primary-button>

    <dialog id="dialog-{{$task->id}}" x-bind:open="open" class="card dialog-task">
        <div class="task-upload-title">
            <h3>{{ $task->name }}</h3>
        </div>
        <div class="uploadDiv" id="uploadDiv-{{$task->id}}" >
            <form method="POST" id="fileForm-{{$task->id}}" class="fileForm" enctype='multipart/form-data'>
                <span class="inputFiles">
                    <div id="fileDiv-{{$task->id}}" class="fileDiv">
                        <input type="file" name="fileInput[]" class="file" id="file-{{$task->id}}" multiple>
                    </div>

                    <div id="checkFiles-{{$task->id}}" class="checkFiles">
                    </div>
                </span>
            </form>
        </div>

        <script>
            let circle{{$task->id}};

            document.getElementById("file-{{$task->id}}").addEventListener("change", (e) => {
                console.log(e.target.files);
                if(e.target.files.length > 0) {
                    document.getElementById("fileDiv-{{$task->id}}").classList.add("fileDiv-active");

                    setTimeout(() => {
                        document.getElementById("checkFiles-{{$task->id}}").classList.add("checkFiles-active");
                        deleteInputElement(e.target.files, @json($task->id));
                    }, 1000);
                } else {
                    document.getElementById("fileDiv-{{$task->id}}").classList.remove("fileDiv-active");
                    document.getElementById("checkFiles-{{$task->id}}").classList.remove("checkFiles-active");
                }
            })

            function deleteButton(files, taskId) {
                let deleteFilesButtons = document.getElementsByClassName("deleteFile")

                Array.prototype.forEach.call(deleteFilesButtons, button => {
                    button.addEventListener("click", (e) => {
                        e.preventDefault();
                        if(Array.isArray(files)) {
                            files = files.filter((file, index) => index != button.value, 1);
                        } else {
                            files = Array.from(files).filter((file, index) => index != button.value, 1);
                        }
                        deleteInputElement(files, taskId);
                    })
                })
            }

            function deleteInputElement(files, taskId) {
                let checkFiles = document.getElementById(`checkFiles-${taskId}`);
                console.log(checkFiles, taskId)
                let htmlString = ``;

                for (let i = 0; i < files.length; i++) {
                    htmlString += `
                    <div class="checkFilesInfo">
                        <p class="fileName">${files[i].name}</p>
                        <button class="deleteFile" value="${i}">
                            x
                        </button>
                    </div>
                `;
                }

                htmlString += `<x-primary-button>Uploaden</x-primary-button>`
                checkFiles.innerHTML = htmlString

                deleteButton(files, taskId)
            }


            document.getElementById("fileForm-{{$task->id}}").addEventListener("submit", (e) => {
                e.preventDefault();
                let files = document.getElementById("file-{{$task->id}}").files;

                let data = new FormData()

                for (let i = 0; i < files.length; i++) {
                    data.append(`fileInput${i}`, files[i])
                }

                data.append('task', {{$task->id}})

                let request = new XMLHttpRequest();
                request.open('POST', `{{ route('courses.tasks.upload', $task->subject_id) }}`);
                request.setRequestHeader('Access-Control-Allow-Headers', '*');
                request.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name=\"csrf-token\"]').content);

                // upload progress event
                request.upload.addEventListener('progress', function(e) {
                    // upload progress as percentage
                    let percent_completed = (e.loaded / e.total)*100;

                    console.log(percent_completed);
                    if (typeof(circle{{$task->id}}) != "object"){
                        document.getElementById('uploadDiv-{{$task->id}}').innerHTML = "";
                        let element = document.createElement("div");
                        element.setAttribute("id", "progress-{{$task->id}}");
                        element.classList.add("progress")
                        document.getElementById('uploadDiv-{{$task->id}}').appendChild(element);
                        circle{{$task->id}} = new ProgressBar.Circle('#progress-{{$task->id}}', {
                            color: '#FCB03C',
                            strokeWidth: 3,
                            duration: 3000,
                        });

                        let value = document.createElement("div");

                        value.setAttribute("id", "progressValue-{{$task->id}}");
                        value.classList.add("progressValue")
                        document.getElementById('progress-{{$task->id}}').appendChild(value);
                    }

                    circle{{$task->id}}.animate(e.loaded / e.total, {
                        duration: 90
                    });
                    document.getElementById("progressValue-{{$task->id}}").innerHTML = Math.round(percent_completed) + "%";
                });

                // request finished event--}}
                request.addEventListener('load', function(e) {
                    // HTTP status message (200, 404 etc)
                    console.log(request.status);

                    console.log(request.response);

                    let data = JSON.parse(request.response);

                    console.log(data);

                    document.getElementById('dialog-{{$task->id}}').close();
                    location.replace("{{ route('courses.tasks', $task->subject_id) }}");
                });

                request.send(data);
            })



        </script>
    </dialog>
</div>
