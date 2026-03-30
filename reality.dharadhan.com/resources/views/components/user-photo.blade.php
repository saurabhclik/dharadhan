@props([
    'photo' => null,
    'name' => 'photo',
])

<div class="user-photo-wrapper">
    <!-- Preview -->
    <div style="margin-bottom:10px; position: relative; display: inline-block;">
        <img id="{{ $name }}Preview" src="{{ $photo }}"
            style="width:100px; height:100px; object-fit:cover; border-radius:50%; border:3px solid #ddd;">

        <button type="button" onclick="removePhoto('{{ $name }}')"
            style="position:absolute; top:5px; right:5px; background:#ef7f1a; color:white;
                   border:none; border-radius:50%; width:28px; height:28px; cursor:pointer;">
            ×
        </button>
    </div>
    <br>
    <!-- File Input -->
    <input type="file" id="{{ $name }}Input" name="{{ $name }}" accept="image/*"
        onchange="openCropModal(event, '{{ $name }}')">

    <input type="hidden" name="{{ $name }}" id="{{ $name }}Cropped">
    <input type="hidden" name="{{ $name }}_remove" id="{{ $name }}Remove" value="0">
</div>

<!-- Crop Modal -->
<div class="modal fade" id="{{ $name }}CropModal" tabindex="-1" role="dialog"
    aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Crop Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <img id="{{ $name }}CropImage" style="max-width:100%;">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cropAndSave('{{ $name }}')">
                    Crop & Save
                </button>
            </div>

        </div>
    </div>
</div>


@push('styles')
    <style>
        .cropper-bg {
            width: 100% !important;
        }
    </style>
@endpush

@push('scripts')
    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <script>
        let croppers = {};

        function openCropModal(event, name) {
            $(".widget-boxed").css('z-index', '9999999999');
            const file = event.target.files[0];
            if (!file) return;

            const img = document.getElementById(name + "CropImage");
            img.src = URL.createObjectURL(file);

            $('#' + name + 'CropModal').modal('show');

            // Destroy previous cropper
            if (croppers[name]) {
                croppers[name].destroy();
            }

            setTimeout(() => {
                croppers[name] = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: "move",
                    autoCropArea: 1
                });
            }, 300);
        }

        function cropAndSave(name) {
            const cropper = croppers[name];

            let canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 470
            });

            // Update preview
            document.getElementById(name + "Preview").src = canvas.toDataURL("image/png");

            // Save to hidden input
            document.getElementById(name + "Cropped").value = canvas.toDataURL("image/png");

            $('#' + name + 'CropModal').modal('hide');
            $(".widget-boxed").css('z-index', 90);

            cropper.destroy();

            document.getElementById(name + "Remove").value = 0;
        }

        function removePhoto(name) {
            document.getElementById(name + "Preview").src = "{{ asset('images/testimonials/ts-1.jpg') }}";
            document.getElementById(name + "Remove").value = 1;
            document.getElementById(name + "Cropped").value = "";
            document.getElementById(name + "Input").value = "";
        }


        $('#photoCropModal').on('hide.bs.modal', function(event) {
            $(".widget-boxed").css('z-index', '90');
        });
    </script>
@endpush
