@if(session()->has('message'))
    <dialog data-neko-added-successfully-dialog>
        <div>
            {{-- <p>You've succesfully registered your Neko and can now view it in the Neko Cards section!</p> --}}
            <p>{{session('message')}}</p>
        </div>
        <div class="dialog-resolver">
            <button class="neko-browse" data-btn="rainbow">
                Got it! <br /> Thanks!
            </button>
            <button class="neko-browse" data-btn="rainbow">
                Got it! <br /> Screw you!
            </button>
        </div>
    </dialog>
    <script>
        const nekoAdded = document.querySelector('[data-neko-added-successfully-dialog]');
        const nekoAddedOk = document.querySelectorAll('.dialog-resolver button');
        for (let okBtn of nekoAddedOk) {
            okBtn.addEventListener('click', closeDialogue);
        }
        function closeDialogue(){
            nekoAdded.close();
        }
        nekoAdded.showModal();
    </script>
@endif