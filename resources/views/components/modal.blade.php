@props(['id' => 'modal_large', 'size' => 'lg'])

<div class="modal fade" tabindex="-1" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-{{ $size }}">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"></h3>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-solid ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body">
                <form id="{{ $id }}_form" class="mb-0">
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>