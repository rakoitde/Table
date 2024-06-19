<!-- Modal -->
<div class="modal fade" id="actionModalConfirm" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btnClose" data-bs-dismiss="modal">No</button>
                <a type="button" href="" class="btn btn-danger btnSubmit">Yes</a>
            </div>
        </div>
    </div>
</div>

<script>
    var actionModalConfirm = document.getElementById('actionModalConfirm')
    actionModalConfirm.addEventListener('show.bs.modal', function (event) {

        // Button that triggered the modal
        var button = event.relatedTarget

        // Get the modal's elements.
        var modalTitle        = actionModalConfirm.querySelector('.modal-title')
        var modalBody         = actionModalConfirm.querySelector('.modal-body')
        var modalCloseButton  = actionModalConfirm.querySelector('.modal-footer .btnClose')
        var modalSubmitButton = actionModalConfirm.querySelector('.modal-footer .btnSubmit')

        // Update modal's content with info from data-confirm-* attributes
        modalTitle.innerHTML        = button.getAttribute('data-confirm-heading')
        modalBody.innerHTML         = button.getAttribute('data-confirm-subtitle')
        modalCloseButton.innerHTML  = button.getAttribute('data-confirm-close-button')
        modalSubmitButton.innerHTML = button.getAttribute('data-confirm-submit-button')
        modalSubmitButton.setAttribute("href", button.getAttribute('href'))

    })
</script>