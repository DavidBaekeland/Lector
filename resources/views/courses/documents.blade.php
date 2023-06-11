<x-app-layout>
    <x-card-small class="mobile">
        <div class="card-small-title">
            <span>Cursussen</span>
        </div>

        <div class="card-small-list">
            @foreach($subjects as $subject)
                <a href="{{ route('courses.show', $subject->id) }}" @class([
                    "card-small-item",
                    "card-small-item-selected" => $selectedSubject->id == $subject->id
                ])>
                    {{$subject->name}}
                </a>
            @endforeach
        </div>
    </x-card-small>

    <x-card-large id="subject-card" x-data="{ open: false }">
        <div id="headerSubject">
            <span class="desktopHeaderSubject">
                @can("manage_subjects")
                    <button x-on:click="open = ! open" class="link-add">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                @else
                    <span></span>
                @endcan

                <h3 id="titleSubject">{{ $selectedSubject->name }}</h3>

                <x-nav-subject :selectedSubject="$selectedSubject" />

            </span>

            <span class="mobileHeaderSubject">
                <span>
                    <a id="course-back" href="{{ route('courses.index') }}" class="videoLink backLinkCourse">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </a>

                <h3 id="titleSubject">{{ $selectedSubject->name }}</h3>

                @can("manage_subjects")
                        <button x-on:click="open = ! open" class="link-add link-add-mobile">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </button>
                    @endcan
                </span>

                <x-nav-subject :selectedSubject="$selectedSubject" />
            </span>


        </div>

        <div class="chapterDiv">
            @foreach($selectedSubject->chapters as $chapter)
                <x-card-chapter :chapter="$chapter" :slug="$slug"></x-card-chapter>
            @endforeach
        </div>
        @can("manage_tasks")
            <dialog class="card dialog-document" x-bind:open="open" id="dialog-document">
                <form id="chapterForm" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <a x-on:click="open = !open" class="link-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>

                    <div class="input-div">
                        <x-text-input type="text" name="title" id="title" :value="old('title')" placeholder="Titel" required autofocus autocomple="off" />
                        <x-input-error :messages="$errors->get('title')"/>
                    </div>

                    <span class="inputFiles" id="inputFilesChapter">
                        <div id="fileDiv" class="fileDiv">
                            <input type="file" name="fileInput[]" class="file" id="file" multiple>
                        </div>

                        <div id="checkFiles" class="checkFiles">
                        </div>
                    </span>

                    <x-secondary-button>Opslaan</x-secondary-button>
                </form>
            </dialog>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/0.6.1/progressbar.js" integrity="sha512-31I8S0k9PCZb3or2whlgM88rgY9mvkSXTxIQMXMkc8N79b29nKc+MN8qVVJT0vE5D8uy1sVuNWrkAt6zEh+PZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script>
                let circle;

                document.getElementById("file").addEventListener("change", (e) => {
                    console.log(e.target.files);
                    if(e.target.files.length > 0) {
                        document.getElementById("fileDiv").classList.add("fileDiv-active");

                        setTimeout(() => {
                            document.getElementById("checkFiles").classList.add("checkFiles-active");
                            deleteInputElement(e.target.files);
                        }, 1000);
                    } else {
                        document.getElementById("fileDiv").classList.remove("fileDiv-active");
                        document.getElementById("checkFiles").classList.remove("checkFiles-active");
                    }
                })

                function deleteButton(files) {
                    let deleteFilesButtons = document.getElementsByClassName("deleteFile")

                    Array.prototype.forEach.call(deleteFilesButtons, button => {
                        button.addEventListener("click", (e) => {
                            e.preventDefault();
                            if(Array.isArray(files)) {
                                files = files.filter((file, index) => index != button.value, 1);
                            } else {
                                files = Array.from(files).filter((file, index) => index != button.value, 1);
                            }
                            deleteInputElement(files);
                        })
                    })
                }

                function deleteInputElement(files) {
                    let checkFiles = document.getElementById(`checkFiles`);
                    console.log(checkFiles)
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

                    checkFiles.innerHTML = htmlString

                    deleteButton(files)
                }


                document.getElementById("chapterForm").addEventListener("submit", (e) => {
                    e.preventDefault();
                    let files = document.getElementById("file").files;
                    let title = document.getElementById("title").value;

                    let data = new FormData()

                    for (let i = 0; i < files.length; i++) {
                        data.append(`fileInput${i}`, files[i])
                    }

                    data.append('title', title)

                    let request = new XMLHttpRequest();
                    request.open('POST', `{{ route('courses.chapter.store', $selectedSubject->id) }}`);
                    request.setRequestHeader('Access-Control-Allow-Headers', '*');
                    request.setRequestHeader("X-CSRF-Token", document.querySelector('meta[name=\"csrf-token\"]').content);

                    // upload progress event
                    request.upload.addEventListener('progress', function(e) {
                        // upload progress as percentage
                        let percent_completed = (e.loaded / e.total)*100;

                        console.log(percent_completed);
                        if (typeof(circle) != "object"){
                            document.getElementById('dialog-document').innerHTML = "";
                            let element = document.createElement("div");
                            element.setAttribute("id", "progress");
                            element.classList.add("progress")
                            document.getElementById('dialog-document').appendChild(element);
                            circle = new ProgressBar.Circle('#progress', {
                                color: '#FCB03C',
                                strokeWidth: 3,
                                duration: 3000,
                            });

                            let value = document.createElement("div");

                            value.setAttribute("id", "progressValue");
                            value.classList.add("progressValue")
                            document.getElementById('progress').appendChild(value);
                        }

                        circle.animate(e.loaded / e.total, {
                            duration: 90
                        });
                        document.getElementById("progressValue").innerHTML = Math.round(percent_completed) + "%";
                    });

                    // request finished event--}}
                    request.addEventListener('load', function(e) {
                        // HTTP status message (200, 404 etc)
                        console.log(request.status);

                        console.log(request.response);

                        let data = JSON.parse(request.response);

                        if (request.status === 200) {
                            document.getElementById('dialog-document').close();
                            location.replace("{{ route('courses.documents', $slug) }}");
                        } else {
                            document.getElementById('uploadDiv').innerHTML = data;
                        }
                    });

                    request.send(data);
                })
            </script>
        @endcan
    </x-card-large>
</x-app-layout>
