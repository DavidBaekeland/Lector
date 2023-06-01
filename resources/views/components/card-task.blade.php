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

    <dialog x-bind:open="open" class="card dialog-task">
        <div class="task-upload-title">
            <h3>{{ $task->name }}</h3>
        </div>
        <div class="uploadDiv">
            <form method="POST" id="fileForm" enctype='multipart/form-data'>
                <span class="inputFiles">
                    <div id="fileDiv-{{$task->id}}" class="fileDiv">
                        <input type="file" name="fileInput[]" class="file" id="file-{{$task->id}}" multiple>
                    </div>

                    <div id="checkFiles-{{$task->id}}" class="checkFiles">
                        <x-primary-button>Uploaden</x-primary-button>
                    </div>
                </span>

            </form>
        </div>

        <script>
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

                checkFiles.insertAdjacentHTML("afterbegin", htmlString)
            }
        </script>
    </dialog>
</div>
