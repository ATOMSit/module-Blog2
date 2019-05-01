@push('styles')

@endpush

@push('scripts')
    <script type="application/javascript">
        function select_media(type) {
            if (type === "image") {
                document.getElementById('select_media_button').style.display = 'none';
                $('#select_media').modal('hide');
            } else {
                $('#select_media').modal('hide');
            }
        }
    </script>
@endpush

<button type="button" class="btn btn-outline-brand btn-xl" data-toggle="modal" id="select_media_button" data-target="#select_media">
    Ajouter un media
</button>

<div class="modal fade" id="select_media" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 align-content-md-center">
                        <a onclick="select_media('image')">
                            <i class="fa fa-film fa-10x"></i>
                        </a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>