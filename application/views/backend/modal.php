    <script type="text/javascript">
    function showAjaxModal(url)
    {
        jQuery('#exampleModal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>assets/images/preloader.gif" /></div>');
        jQuery('#exampleModal').modal('show', {backdrop: 'true'});
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#exampleModal .modal-body').html(response);
            }
        });
    }
    </script>
    
    <div aria-hidden="true" aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg" role="dialog" tabindex="-1" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="margin-top:250px;"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;?></h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
                </div>        
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
            jQuery('#modal_delete').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
    </script>
    <style>
    .datepicker{z-index:1151 !important;}
    </style>


    <div class="modal fade" id="modal_delete">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:300px;">
                <div class="modal-header">
                    <center><h5 class="modal-title">Confirmación</h5></center>
                </div>
                <div class="col-sm-12"><br>
                <p style="text-align: center;">Esta acción borrará los datos seleccionados y no se podrán recuperar de nuevo, aún así ¿deseas continuar?</p><hr>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <span id="preloader-delete"></span>
                    <br>
                    <a href="#" class="btn btn-danger" id="delete_link">Sí, eliminar</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
